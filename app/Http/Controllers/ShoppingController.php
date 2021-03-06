<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use ShoppingCart;
use Mail;

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

    public function incrementQty($id, $qty){
        ShoppingCart::update($id, $qty + 1);
        return redirect()->back();
    }

    public function reduceQty($id, $qty){
        ShoppingCart::update($id, $qty - 1);
        return redirect()->back();
    }

    public function rapidAdd(Request $request, $id){

        $pdt = Product::find($id);
        $cart=ShoppingCart::add($pdt->id,$pdt->name,1,$pdt->price,['image'=> $pdt->image]);

        return redirect()->route('cart');
    }

    public function checkout(){
        return view('checkout');
    }

    public function email(){
        Mail::to('jloudias@gmail.com')->send(new \App\Mail\PurchaseSuccessful);
        return redirect('/');
    }
}
