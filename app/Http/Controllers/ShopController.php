<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PaychanguService;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->where('status', 'active')
            ->where('in_stock', true)
            ->get();
        
        $categories = Category::where('is_active', true)->get();
        
        // Transform data for JavaScript
        $productsData = $products->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category->slug ?? 'uncategorized',
                'price' => (float) $product->price,
                'originalPrice' => $product->original_price ? (float) $product->original_price : null,
                'image' => $product->image ?? 'assets/img/gift-shop/default.webp',
                'description' => $product->description,
                'badge' => $product->badge,
                'inStock' => $product->in_stock,
                'entrepreneur' => $product->entrepreneur ?? 'Local Artisan',
                'manageStock' => (bool) $product->manage_stock,
                'stockQuantity' => (int) $product->stock_quantity,
            ];
        });
        
        $categoriesData = $categories->map(function($category) {
            return [
                'slug' => $category->slug,
                'name' => $category->name
            ];
        });
        
        return view('shop', compact('products', 'categories', 'productsData', 'categoriesData'));
    }

    public function getProducts(Request $request)
    {
        $query = Product::with('category')
            ->where('status', 'active')
            ->where('in_stock', true);

        // Filter by category
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Sort products
        switch ($request->get('sort', 'default')) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
        }

        $products = $query->get();

        return response()->json([
            'products' => $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'category' => $product->category->slug ?? 'uncategorized',
                    'price' => (float) $product->price,
                    'originalPrice' => $product->original_price ? (float) $product->original_price : null,
                    'image' => $product->image ?? 'assets/img/gift-shop/default.webp',
                    'description' => $product->description,
                    'badge' => $product->badge,
                    'inStock' => $product->in_stock,
                    'entrepreneur' => $product->entrepreneur ?? 'Local Artisan',
                    'manageStock' => (bool) $product->manage_stock,
                    'stockQuantity' => (int) $product->stock_quantity,
                ];
            })
        ]);
    }

    public function show(Product $product)
    {
        if ($product->status !== 'active') {
            abort(404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category->slug ?? 'uncategorized',
            'price' => (float) $product->price,
            'originalPrice' => $product->original_price ? (float) $product->original_price : null,
            'image' => $product->image ?? 'assets/img/gift-shop/default.webp',
            'description' => $product->description,
            'badge' => $product->badge,
            'inStock' => $product->in_stock,
            'entrepreneur' => $product->entrepreneur ?? 'Local Artisan'
        ]);
    }

    public function placeOrder(Request $request, PaychanguService $paychanguService)
    {
        $validated = $request->validate([
            'customer.firstName' => 'required|string|max:100',
            'customer.lastName' => 'required|string|max:100',
            'customer.email' => 'required|email|max:255',
            'customer.phone' => 'nullable|string|max:50',
            'customer.address' => 'required|string|max:500',
            'customer.city' => 'required|string|max:150',
            'customer.district' => 'required|string|max:150',
            'paymentMethod' => 'required|in:cod,mobile,bank',
            'orderNotes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request, $paychanguService) {
            $items = collect($request->input('items', []));

            // Validate stock levels before creating the order
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                if ($product && $product->manage_stock) {
                    if ($item['quantity'] > $product->stock_quantity) {
                        // Create a failed order record for auditing
                        $failed = Order::create([
                            'user_id' => optional($request->user())->id,
                            'customer_name' => trim($request->input('customer.firstName') . ' ' . $request->input('customer.lastName')),
                            'customer_email' => $request->input('customer.email'),
                            'customer_phone' => $request->input('customer.phone'),
                            'billing_address' => [
                                'address' => $request->input('customer.address'),
                                'city' => $request->input('customer.city'),
                                'district' => $request->input('customer.district'),
                            ],
                            'shipping_address' => null,
                            'subtotal' => 0,
                            'tax_amount' => 0,
                            'shipping_amount' => 0,
                            'total_amount' => 0,
                            'status' => 'pending',
                            'payment_status' => 'failed',
                            'payment_method' => $request->input('paymentMethod'),
                            'notes' => $request->input('orderNotes'),
                            'failure_reason' => 'Insufficient stock for product ID ' . $item['id'],
                        ]);

                        return response()->json([
                            'message' => 'Insufficient stock for one or more items',
                            'error' => 'Requested quantity exceeds available stock',
                            'order' => [ 'id' => $failed->id, 'order_number' => $failed->order_number ]
                        ], 422);
                    }
                }
            }
            $subtotal = $items->reduce(function ($carry, $item) {
                return $carry + ((float) $item['price'] * (int) $item['quantity']);
            }, 0.0);

            $taxAmount = 0.0;
            $shippingAmount = 0.0; // Free delivery as per UI
            $totalAmount = $subtotal + $taxAmount + $shippingAmount;

            $order = Order::create([
                'user_id' => optional($request->user())->id,
                'customer_name' => trim($request->input('customer.firstName') . ' ' . $request->input('customer.lastName')),
                'customer_email' => $request->input('customer.email'),
                'customer_phone' => $request->input('customer.phone'),
                'billing_address' => [
                    'address' => $request->input('customer.address'),
                    'city' => $request->input('customer.city'),
                    'district' => $request->input('customer.district'),
                ],
                'shipping_address' => null,
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'shipping_amount' => $shippingAmount,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => $request->input('paymentMethod'),
                'notes' => $request->input('orderNotes'),
            ]);

            // Create order items
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                $price = $product ? (float) $product->price : (float) $item['price'];
                $quantity = (int) $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product?->id,
                    'product_name' => $product?->name ?? $item['name'],
                    'product_price' => $price,
                    'quantity' => $quantity,
                    'total' => $price * $quantity,
                ]);

                // Reduce stock if managed
                if ($product && $product->manage_stock) {
                    $product->decrement('stock_quantity', $quantity);
                    $product->refresh();
                    if ($product->stock_quantity <= 0) {
                        $product->in_stock = false;
                        $product->save();
                    }
                }
            }

            if (in_array($order->payment_method, ['mobile', 'bank'])) {
                $baseUrl = $request->getScheme() . '://' . $request->header('host');
                $paymentData = [
                    'amount' => $order->total_amount,
                    'currency' => 'MWK',
                    'email' => $order->customer_email,
                    'first_name' => $request->input('customer.firstName'),
                    'last_name' => $request->input('customer.lastName'),
                    'tx_ref' => $order->order_number,
                ];

                $paymentResponse = $paychanguService->initiatePayment($paymentData, $baseUrl);

                if (isset($paymentResponse['status']) && $paymentResponse['status'] === 'success') {
                    return response()->json([
                        'message' => 'Order placed, redirecting to payment.',
                        'checkout_url' => $paymentResponse['data']['checkout_url'],
                    ], 201);
                } else {
                    // Payment initiation failed, revert stock and fail order
                    $order->update(['status' => 'failed', 'payment_status' => 'failed', 'failure_reason' => 'Payment gateway error']);
                    // Revert stock changes
                    foreach ($items as $item) {
                        $product = Product::find($item['id']);
                        if ($product && $product->manage_stock) {
                            $product->increment('stock_quantity', $item['quantity']);
                        }
                    }
                    return response()->json([
                        'message' => 'Failed to initiate payment.',
                        'error' => $paymentResponse['message'] ?? 'Unknown payment gateway error.'
                    ], 500);
                }
            }

            return response()->json([
                'message' => 'Order placed successfully',
                'order' => [
                    'id' => $order->id,
                    'order_number' => $order->order_number,
                    'total' => (float) $order->total_amount,
                    'status' => $order->status,
                    'payment_status' => $order->payment_status,
                ],
            ], 201);
        });
    }
}