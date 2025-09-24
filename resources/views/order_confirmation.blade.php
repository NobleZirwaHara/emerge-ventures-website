@extends('layouts.master')

@section('title', 'Order Confirmation - Emerge Ventures')

@section('content')
<section class="checkout-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="order-success text-center py-5">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h2 class="text-success mb-3">Thank You For Your Order!</h2>
                    <p class="lead mb-4">Your payment was successful and your order is being processed.</p>

                    <div class="order-details bg-light p-4 rounded mb-4 text-start">
                        <h5 class="text-center mb-4">Order Summary</h5>
                        <p><strong>Order ID:</strong> {{ $order->order_number }}</p>
                        <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Total Amount:</strong> MWK {{ number_format($order->total_amount, 2) }}</p>
                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">{{ ucfirst($order->status) }}</span></p>
                        <hr>
                        <h6>Items Ordered:</h6>
                        <ul class="list-group">
                            @foreach($order->items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->product_name }} (Qty: {{ $item->quantity }})
                                    <span>MWK {{ number_format($item->total, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="next-steps mb-4 text-start">
                        <h6>What happens next?</h6>
                        <ul class="list-unstyled">
                            <li>✓ We've sent an order confirmation email to {{ $order->customer_email }} (it will be processed in the background).</li>
                            <li>✓ Your order will be prepared within 1-2 business days.</li>
                            <li>✓ We'll contact you to arrange delivery.</li>
                        </ul>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('shop.index') }}" class="btn btn-primary me-3">Continue Shopping</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">View My Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
