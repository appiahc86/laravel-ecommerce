<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Overtrue\LaravelShoppingCart\Facade as Cart;


class CartController extends Controller
{
    //Add Item To Cart
    public function add_to_cart(Product $product){

        request()->validate([
            'qty'=>'required'
        ]);

        Cart::associate('App\Product');

        Cart::add(
            $product->id,
            $product->name,
            request()->qty,
            $product->price
        );

        Session::flash('success', 'Product Successfully Added To Cart');
        return redirect()->back();


    }


//  Rapidly Add Item To Cart
    public function rapid_add(Product $product){



      Cart::associate('App\Product');

        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price
        );

        Session::flash('success', 'Product Successfully Added To Cart');
        return redirect()->back();

    }

//    Remove Item
    public function delete($id){

        Cart::remove($id);

        Session::flash('success', 'Product Removed From Cart');
        return redirect()->back();
    }


//    Edit quantity
    public function qty_edit($product){

        Cart::update($product, request()->qty);

        return redirect()->back();

    }


//    View Cart Page
    public function view(){

//        if (Cart::isEmpty()){
//            return redirect()->back();
//        }

        return view('cart');
    }


}
