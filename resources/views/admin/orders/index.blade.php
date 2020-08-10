@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header"><b>Orders</b></div>
        <div class="card-body">

            @if(count($orders) > 0)


                <div class="table-responsive">

                    <table class="table">

                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Customer Name</th>
                            <th>E-mail</th>
                            <th>Time</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

        <tbody>

        @foreach($orders as $order)

            @php
            $myOrder =  \App\Order::where('order_number', $order)->first();
            @endphp

            <tr>
                <td>{{ $myOrder->order_number }}</td>
                <td>{{ $myOrder->user->name}}</td>
                <td>{{ $myOrder->user->email }}</td>
                <td>{{ $myOrder->created_at->diffForHumans() }}</td>
                <td><a href="{{ route('admin.orders.show', $myOrder->order_number) }}">view</a></td>
                <td>delete</td>
            </tr>

        @endforeach
        </tbody>
                    </table>

                </div>



                @else
            <h3 class="text-center text-primary">There are no orders!!!</h3>

            @endif

        </div>
    </div>


@endsection
