<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_category($category){

        $products = Product::where('category', $category)->paginate(6);

        return view('store', compact('products'));

    }



    public function product_search(ProductSearchRequest $request){

           if (empty($request->category)){

               $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(6);
           }

           else{

               $products = Product::where('category', $request->category)->where('name', 'like', '%' . $request->search . '%')->paginate(6);

           }

           return view('store', compact('products'));

    }

}
