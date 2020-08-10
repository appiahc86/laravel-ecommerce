<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'name')->all();
        return view('admin.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {

          $image_one = $request->image_one->store('products');
          $image_two = $request->image_two->store('products');
          $image_three = $request->image_three->store('products');
          $image_four = $request->image_four->store('products');


       Product::create([

           'name'=> $request->name,
           'price'=> $request->price,
           'category'=> $request->category,
           'img1'=> $image_one,
           'img2'=> $image_two,
           'img3'=> $image_three,
           'img4'=> $image_four,
           'description'=> $request->description

       ]);

       Session::flash('success', 'Product Added Successfully');
       return redirect(route('product.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $category = Category::pluck('name', 'name')->all();
        return view('admin.products.create', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {

        $img1 = $product->img1;
        $img2 = $product->img2;
        $img3 = $product->img3;
        $img4 = $product->img4;

        if ($request->image_one){  // If image one is provided by the user
            Storage::delete($img1);
            $image1 = $request->image_one->store('products');
        } else{
            $image1 = $img1;
        }


        if ($request->image_two){  // If image two is provided by the user
            Storage::delete($img2);
            $image2 = $request->image_two->store('products');
        } else{
            $image2 = $img2;
        }



        if ($request->image_three){  // If image three is provided by the user
            Storage::delete($img3);
            $image3 = $request->image_three->store('products');
        } else{
            $image3 = $img3;
        }



        if ($request->image_four){  // If image four is provided by the user
            Storage::delete($img4);
            $image4 = $request->image_four->store('products');
        } else{
            $image4 = $img4;
        }

        //Update the record in the database

        $product->update([

            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'img1' => $image1,
            'img2' => $image2,
            'img3' => $image3,
            'img4' => $image4,
            'description' => $request->description

        ]);

        Session::flash('success', 'Product updated successfully');
        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->img1);
        Storage::delete($product->img2);
        Storage::delete($product->img3);
        Storage::delete($product->img4);

        $product->delete();

        Session::flash('success', 'Product deleted successfully');
        return redirect(route('product.index'));
    }
}
