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
        $cart=ShoppingCart::add($pdt->id,$pdt->name,$request->qty,$pdt->price,['image'=> $pdt->image]);

        return redirect()->route('cart');
    }

    public function cart(){
        //ShoppingCart::destroy();
        return view('cart');
    }

    public function deleteFromCart($id){
        ShoppingCart::remove($id);
        return redirect()->back();
    }
}
