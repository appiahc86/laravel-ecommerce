<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    //
    public function index(){

//        $products = Product::paginate(6);
        $products = Product::inRandomOrder()->paginate(6);
        return view('store', compact('products'));

    }

    public function show(Product $product){

        return view('product', compact('product'));

    }



}
