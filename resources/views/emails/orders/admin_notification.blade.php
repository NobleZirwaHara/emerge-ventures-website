@component('mail::message')
# New Order Received

A new order with ID **{{ $order->order_number }}** has been placed.

**Customer Details:**
- **Name:** {{ $order->customer_name }}
- **Email:** {{ $order->customer_email }}
- **Phone:** {{ $order->customer_phone }}

**Billing Address:**
{{ $order->billing_address['address'] }}, {{ $order->billing_address['city'] }}, {{ $order->billing_address['district'] }}

**Order Summary:**

<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>MWK {{ number_format($item->total, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

**Total: MWK {{ number_format($order->total_amount, 2) }}**

Please process this order.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
