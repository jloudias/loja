<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group....
| 
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'FrontEndController@index')->name('index');

//Authentication
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Product
Route::get('/product/{id}', 'FrontEndController@singleProduct')->name('product.single');

//Shopping Cart
Route::post('/cart/add', 'ShoppingController@addToCart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}','ShoppingController@deleteFromCart')->name('cart.delete');
Route::get('/cart/reduce/{id}/{qty}', 'ShoppingController@reduceQty')->name('cart.reduce');
Route::get('/cart/increment/{id}/{qty}', 'ShoppingController@incrementQty')->name('cart.increment');
Route::get('/cart/rapid/add/{id}', 'ShoppingController@rapidAdd')->name('cart.rapid.add');
Route::get('/cart/checkout', 'ShoppingController@checkout')->name('cart.checkout');

//Voyager Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


