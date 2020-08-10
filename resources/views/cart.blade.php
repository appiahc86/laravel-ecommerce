@php
    use Overtrue\LaravelShoppingCart\Facade as Cart;
@endphp

@extends('layouts.front')

@section('content')

    <style>
        .chkwidth{
            max-width: 90px;
            overflow: hidden;
        }

        .cartimg{
            max-width: 64px;
            max-height: 64px;
        }
    </style>



<br>
<h1 class="text-center">In Your Shopping Cart: <span class="text-danger">{{ Cart::countRows() }} Item(s)</span></h1>

    <div class="container">
        <div class="row">
            <div class="col">


                @if(Cart::countRows() > 0)

                <div class="table-responsive">


                    <div class="card shadow">



                        <table class="table table-hover">


                            <div class="card-header">

                                <thead style="background: #1b4b72; color: ghostwhite;">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>

                            </div>


                            <tbody>

                                @foreach(Cart::all() as $product)

                                    <tr>
                                        {{--                    <td></td>--}}
                                        <td><a href="{{ route('cart.delete', $product->rawId()) }}" class="text-danger">X</a></td>
                                        <td><img class="cartimg" src="{{ 'storage/' . $product->product->img1 }}" alt=""></td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>

                                            {!! Form::open(['method'=>'POST', 'action'=>['CartController@qty_edit', $product->rawId()]]) !!}


                                            <div class="input-number chkwidth">
                                                <input class="" type="number" min="1" value="{{ $product->qty }}" name="qty" onchange="form.submit()">
                                                <span class="qty-up">+</span>
                                                <span class="qty-down">-</span>
                                            </div>

                                            {!! Form::close() !!}

                                        </td>
                                        <td class="text-danger" style="font-weight: bold;">${{ number_format($product->total, 2) }}</td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                        <div class="card-footer text-center"> <!-- Card Footer -->

                <h2 class="text-center"><span class="fa fa-shopping-cart"></span> Cart Total: <span class="text-danger">${{ round(Cart::total(), 2) }}</span></h2>
                            <br>

                            <div class="col justify-content-center">
                                <a href="{{ route('checkout') }}" class="btn btn-primary"><b>Checkout</b></a>
                            </div>



                        </div>        <!-- /.Card Footer -->

                    </div>    <!-- /.Card -->


                </div>       <!-- /.Table-responsive-->

         @else
                    <br>
                    <br>
            <h3 class="text-center text-primary">Your Cart is empty</h3>
        @endif



            </div>    <!-- /.Col-->
        </div>    <!-- /.Row-->
    </div>    <!-- /.Container-->


@endsection
