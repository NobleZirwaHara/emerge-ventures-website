<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\PaychanguService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Mail\AdminOrderNotification;

class PaymentController extends Controller
{
    public function callback(Request $request, PaychanguService $paychanguService)
    {
        $txRef = $request->query('tx_ref');

        if (!$txRef) {
            return redirect()->route('shop.index')->with('error', 'Invalid payment callback.');
        }

        $response = $paychanguService->verifyPayment($txRef);

        if (isset($response['status']) && $response['status'] === 'success' && isset($response['data']['status']) && $response['data']['status'] === 'success') {
            $order = Order::where('order_number', $txRef)->first();

            if ($order && $order->payment_status === 'pending') {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'processing',
                ]);

                // Send confirmation emails
                Mail::to($order->customer_email)->send(new OrderConfirmation($order));
                // Mail::to(config('mail.from.address'))->send(new AdminOrderNotification($order));
            }

            return redirect()->route('shop.index')->with('success', 'Payment successful! Your order is being processed.');
        } else {
            $order = Order::where('order_number', $txRef)->first();
            if ($order) {
                $order->update([
                    'payment_status' => 'failed',
                    'status' => 'failed',
                    'failure_reason' => $response['message'] ?? 'Payment verification failed.',
                ]);
            }
            return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
        }
    }

    public function return(Request $request)
    {
        $txRef = $request->query('tx_ref');
        $status = $request->query('status');

        if ($txRef && $status === 'failed') {
            $order = Order::where('order_number', $txRef)->first();
            if ($order && $order->payment_status === 'pending') {
                $order->update([
                    'payment_status' => 'failed',
                    'status' => 'failed',
                    'failure_reason' => 'Payment was canceled or failed.',
                ]);
            }
        }

        return redirect()->route('checkout')->with('error', 'Payment was not completed. Please try again.');
    }
}
