<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function allProduct(){
        $products = Product::all();
        return view('Home',compact('products'));
    }
    public function addToCart(Request $request,Cart $cart){
       //return $request->product_id;
       $cart = new Cart;
       $c= $cart->where('product_id',$request->product_id)->first();

        if($c) {
            $c->increment('product_count');
        }else{
        $c = $cart->create([
            'product_id' => $request->product_id,
            'product_count' => 1
        ]);
        }

    }

    public function getCartData(Cart $cart){
        $get_cart_data_sum = Cart::sum('product_count');
        return response()->json($get_cart_data_sum);
    }

    public function viewAddedItem(Product $product){
       $products_of_cart = Cart::with('product')->where('product_count','>','0')->get();
       return view('viewAddedItem',compact('products_of_cart'));
    }

    public function getPost(){
        Gate::allows('isAdmin')? Response::allow() :abort(403);
        return 'Working';
    }
}
