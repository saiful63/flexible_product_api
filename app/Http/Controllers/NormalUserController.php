<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class NormalUserController extends Controller
{
    public function normalUserHome(){
        $products = Product::all();
        return view('normal_user_home',compact('products'));
    }
}
