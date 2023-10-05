<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProductController extends BaseController
{

    public function index(){
        $products = Product::where('user_id',Auth::user()->id)->get();
        return $this->sendResponse($products->toArray(),'Product retrived');

    }

    public function store(Request $request,Product $product){
       $validator = Validator::make($request->all(),[

            'book_name'=>['required'],
            'user_id'=>['required'],
            'book_price'=>['required'],
            'book_writer'=>['required'],

        ]);

        if($validator->fails()){
            return $this->sendError('Validation error',$validator->errors());
        }
        $products_item = $request->all();
        $product->create($products_item);
        return $this->sendResponse($products_item,'Product added successfully');
    }


    public function show($id){
       $product = Product::find($id);
       if(is_null($product)){
        return $this->sendError('Product not found',[]);
       }else{
        return $this->sendResponse($product,'Product retrived');
       }
    }

    public function update(Request $request,Product $product){
       $validator = Validator::make($request->all(),[

            'book_name'=>['required'],
            'user_id'=>['required'],
            'book_price'=>['required'],
            'book_writer'=>['required'],

        ]);

        if($validator->fails()){
            return $this->sendError('Validation error',$validator->errors());
        }

        $product->update($request->all());
        return $this->sendResponse($product,'Product updated');
    }

    public function destroy(Product $product){
       $product->delete();
       return $this->sendResponse($product,'Product deleted');
    }
}
