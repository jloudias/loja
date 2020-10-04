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

Route::get('/', 'App\Http\Controllers\FrontEndController@index')->name('index');

//Authentication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Product
Route::get('/product/{id}', 'App\Http\Controllers\FrontEndController@singleProduct')->name('product.single');

//Shopping Cart
Route::post('/cart/add', 'App\Http\Controllers\ShoppingController@addToCart')->name('cart.add');
Route::get('/cart', 'App\Http\Controllers\ShoppingController@cart')->name('cart');

//Voyager Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


