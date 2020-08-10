@component('mail::message')
# Hello {{ session('order_name') }}

Thanks for shopping with us. <br>
We are processing your order and it will be shipped within 7 working days.
Your order number is <span style="color: #ea0909">{{ session('order_id') }}.</span>
 <br>



{{--@component('mail::button', ['url' => 'http://127.0.0.1:8000/cart'])--}}
{{--Button Text--}}
{{--@endcomponent--}}
<br>

Regards,<br>
{{ config('app.name') }}
@endcomponent
