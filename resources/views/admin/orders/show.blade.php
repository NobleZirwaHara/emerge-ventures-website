<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 min-h-screen p-4">
            <div class="mb-8">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <p class="text-gray-400">{{ auth()->user()->name }}</p>
            </div>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded bg-gray-700">Orders</a>
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                <a href="{{ route('admin.team-members.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Team</a>
                <a href="{{ route('admin.workspace-bookings.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Workspace</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Order {{ $order->order_number }}</h2>
                    <p class="text-gray-600">Placed on {{ $order->created_at->format('Y-m-d H:i') }}</p>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Back to Orders</a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Order Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Customer</h3>
                    <div class="space-y-1 text-sm text-gray-700">
                        <div class="font-medium text-gray-900">{{ $order->customer_name }}</div>
                        <div>{{ $order->customer_email }}</div>
                        @if($order->customer_phone)
                        <div>{{ $order->customer_phone }}</div>
                        @endif
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Billing Address</h3>
                    <div class="space-y-1 text-sm text-gray-700">
                        <div>{{ data_get($order->billing_address, 'address') }}</div>
                        <div>{{ data_get($order->billing_address, 'city') }}</div>
                        <div>{{ data_get($order->billing_address, 'district') }}</div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Status</h3>
                    <div class="space-y-2">
                        <div>
                            <span class="text-sm text-gray-500">Order Status</span>
                            <div class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'shipped') bg-indigo-100 text-indigo-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Payment Status</span>
                            <div class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->payment_status === 'paid') bg-green-100 text-green-800
                                    @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->payment_status === 'failed') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>
                        </div>
                        <div class="text-sm text-gray-700">
                            <div><span class="text-gray-500">Payment Method:</span> <span class="uppercase">{{ $order->payment_method }}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold">Items</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($order->items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->product_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">MWK {{ number_format($item->product_price, 0) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">MWK {{ number_format($item->total, 0) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">No items found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Totals -->
            <div class="bg-white rounded-lg shadow p-6 max-w-xl">
                <div class="space-y-2 text-sm text-gray-700">
                    <div class="flex justify-between"><span>Subtotal</span><span>MWK {{ number_format($order->subtotal, 0) }}</span></div>
                    <div class="flex justify-between"><span>Tax</span><span>MWK {{ number_format($order->tax_amount, 0) }}</span></div>
                    <div class="flex justify-between"><span>Delivery</span><span>MWK {{ number_format($order->shipping_amount, 0) }}</span></div>
                    <hr>
                    <div class="flex justify-between font-semibold text-gray-900"><span>Total</span><span>MWK {{ number_format($order->total_amount, 0) }}</span></div>
                </div>
            </div>

            @if($order->notes)
            <div class="bg-white rounded-lg shadow p-6 mt-6">
                <h3 class="text-lg font-semibold mb-2">Order Notes</h3>
                <div class="text-sm text-gray-700">{{ $order->notes }}</div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>


