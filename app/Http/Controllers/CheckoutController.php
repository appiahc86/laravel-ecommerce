<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Overtrue\LaravelShoppingCart\Facade as Cart;
use App\Order;
use App\Product;


class CheckoutController extends Controller
{
   public function index(){

//       if (Cart::isEmpty()){
//
//           return redirect()->back();
//
//       }

       return view('checkout');

   }


   public function pay(){

       $user = Auth::user();

       $order_number = Auth::user()->id . time();

//       return $order_id;
       foreach (Cart::all() as $product){

            $user->orders()->create([

                'product_id' => $product->product->id,
                'order_number' => $order_number,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $product->qty,
                'total' => $product->total

            ]);

       }

       Cart::destroy();

       $order_person = Auth::user()->name;
       Session::flash('order_id', $order_number);
       Session::flash('order_name', $order_person);
       $mail = 'appiahc86@gmail.com';

       Mail::to($mail)->send(new OrderEmail());

       return redirect(route('welcome'));

   }

}
