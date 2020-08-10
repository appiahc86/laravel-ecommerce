@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">This order</div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-sm table-hover">

                    <tbody>

                    @foreach($orders as $order)

                        <tr>
                            <td><b>Product Name</b></td>
                            <td class="text-primary"><b>{{ $order->name }}</b></td>
                        </tr>

                        <tr>
                            <td><b>Price</b></td>
                            <td class="text-danger">${{ number_format($order->price, 2) }}</td>
                        </tr>

                        <tr>
                            <td><b>Quantity</b></td>
                            <td>{{ $order->qty }}</td>
                        </tr>

                        <tr>
                            <td><b>Total</b></td>
                            <td class="text-danger"><b>${{ number_format($order->total, 2) }}</b></td>
                        </tr>

                        <tr>
                            <td colspan="4" style="background: #8a6d3b"></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        <div class="card-footer">
            <h3>Total: <span class="text-danger"><b>${{ number_format($total,2) }}</b></span></h3>
        </div>

    </div>


@endsection
