<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //
    public function index(){

        $orders = Order::distinct('order_number')->orderBy('id', 'DESC')->pluck('order_number');


        return view('admin.orders.index')->with('orders', $orders);

    }



    public function show($order){

        $orders = Order::where('order_number', $order)->get();
        $total = Order::where('order_number', $order)->sum('total');

        return view('admin.orders.show', compact('orders', 'total'));

    }


}
