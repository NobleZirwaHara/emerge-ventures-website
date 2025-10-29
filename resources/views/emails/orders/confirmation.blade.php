@component('mail::message')
# Order Confirmation

Hi {{ $order->customer_name }},

Thank you for your order!

Your order with ID **{{ $order->order_number }}** has been received and is now being processed.

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

We will notify you again once your order has been shipped.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
