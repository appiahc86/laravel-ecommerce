<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'StoreController@index')->name('welcome');
Route::get('/show/s3tif90{product}85436-h7wi674/product.html', 'StoreController@show')->name('show-product');

Auth::routes();

//Admin
Route::group(['middleware'=>['auth', 'admin']], function (){

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::resource('/admin/product', 'ProductController');
    Route::resource('/admin/category', 'CategoryController');
    Route::get('/admin/orders', 'OrderController@index')->name('admin.orders');
    Route::get('/admin/orders/{order}', 'OrderController@show')->name('admin.orders.show');

});


Route::group(['middleware'=>'auth'], function(){

    // Add To Cart
    Route::post('/cart/add/{product}', 'CartController@add_to_cart')->name('cart.add');
    Route::post('/cart/{product}/rapid', 'CartController@rapid_add')->name('rapid.add');
    Route::post('/cart/{product}/edit', 'CartController@qty_edit')->name('qty.edit');


});



//searches
Route::get('/category/search/{category}', 'SearchController@search_category')->name('search.cat');
Route::get('/search/product', 'SearchController@product_search')->name('search.product');

//Cart Page
Route::get('/cart', 'CartController@view')->name('cart');

//Remove From Cart
Route::get('/cart/{id}/delete', 'CartController@delete')->name('cart.delete');

//Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/checkout/pay', 'CheckoutController@pay')->name('pay');


//Payment successful Route
Route::get('/payment/success', 'PaymentController@success')->name('payment-success');

//Route::get('/email', function(){
//    return new \App\Mail\OrderEmail();
//});


