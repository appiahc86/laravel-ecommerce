@php
    use Overtrue\LaravelShoppingCart\Facade as Cart;
    use Illuminate\Http\Request;
@endphp

@extends('layouts.front')

@section('content')

    <br>
    <h1 class="text-center">Your Order</h1>
          @if(Cart::countRows() > 0)
              <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">


               <div class="table-responsive">

                   <table class="table">

                       <thead>
                       <tr style="font-size: 1.4em;">
                           <th class="text-center">Product</th>
                           <th class="text-center">Quantity</th>
                           <th class="text-center">Total</th>
                       </tr>
                       </thead>


                       <tbody>

                       @foreach(Cart::all() as $product)

                           <tr class="text-center">
                               <td>{{ $product->name }}</td>
                               <td>x {{ $product->qty }}</td>
                               <td class="text-danger"><b>${{ number_format($product->total, 2) }}</b></td>
                           </tr>

                       @endforeach


                       <tr style="font-size: 2em; background: #1d68a7; color: white">
                           <td class="text-center"><b>Total</b></td>
                           <td></td>
                           <td class="text-center"><b>${{ number_format(Cart::total(), 2 )}}</b></td>
                       </tr>


                       </tbody>

                   </table>

                   <!-- payment button -->
                   <ul class="footer-payments">
                       <li><a href="#"><i class="fa fa-cc-visa text-danger"></i></a></li>
                       <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                       <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                       <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                       <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>

{{--                       <span>--}}
{{--                       <a href="{{ route('pay') }}" class="btn btn-success" style="float: right; margin-top: 8px;"><i class="fa fa-money"></i> Pay</a>--}}
{{--                   </span>--}}

                   </ul>
               @php


               $invoice = Auth::user()->id . time();

               session(['invoice' => $invoice]);

               @endphp

                   <form action="https://manage.ipaygh.com/gateway/checkout" method="post">
                       <input type="hidden" name="merchant_key" value="">
                       <input type="hidden" name="success_url"  value="http://localhost:8000/payment/success">
                       <input type="hidden" name="cancelled_url" value="http://localhost:8000">
                       <input type="hidden" name="ipn_url"  value="">
                       <input type="hidden" name="invoice_id" value="{{ $invoice }}">
                       <input type="hidden" name="total" value="{{ Cart::total()}}">
                       <button type="submit">Make Payment</button>
                   </form>



               </div>  <!-- ./col -->


            </div>  <!-- ./col -->
        </div>  <!-- ./row -->
    </div>  <!-- ./container -->

              @else
              <br><br>
              <h3 class="text-center text-primary">There are no items in your cart</h3>

    @endif

@endsection
