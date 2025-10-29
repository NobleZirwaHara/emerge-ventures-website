@component('mail::message')
# Your Order Status has been Updated

Hi {{ $order->customer_name }},

This is an update regarding your order with ID **{{ $order->order_number }}**.

The status of your order has been updated to: **{{ ucfirst($order->status) }}**.

@if($order->status == 'shipped')
Your order is on its way! We will contact you shortly to arrange the delivery details.
@elseif($order->status == 'delivered')
Your order has been delivered. We hope you enjoy your products!
@elseif($order->status == 'cancelled')
Your order has been cancelled. If you have any questions, please contact us.
@endif

You can view your order details in your dashboard.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
