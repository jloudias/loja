<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use ShoppingCart;

class ShoppingController extends Controller
{
    //
    public function addToCart(Request $request){
         $pdt = Product::find($request->pdt_id);

         $cart=ShoppingCart::add($pdt->id,$pdt->name,$request->qty,$pdt->price);

        dd($cart);
    }
}
