<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontEndController extends Controller
{
    //
    public function index(){
        return view("index")->with('prods', Product::paginate(3));
    }
}
