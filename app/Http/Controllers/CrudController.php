<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Session;


class CrudController extends Controller
{


    public function AddData(){
        return view('add_info');
    }

    public function StoreData(Request $request){
        $str = [
            'book_name' => 'required|max:10',
            'book_price' => 'required|max:10',
            'book_writer' => 'required|max:10',

        ];

        $cr = [
            'book_name.required' => 'Name field mandatory',
            'book_name.max' => 'Your name cannot be more than 10 character',
            'book_price.required' => 'Price field mandatory',
            'book_price.max' => 'Price cannot be more than 10 character',
            'book_writer.required' => 'Writer Name field mandatory',
            'book_writer.max' => 'Writer name cannot be more than 10 character',

        ];

        $this->validate($request,$str,$cr);

        $product = new Product;
        $product->book_name = $request->book_name;
        $product->user_id = Auth::user()->id;
        $product->book_price = $request->book_price;
        $product->book_writer = $request->book_writer;

        $product->save();
        Session::flash('msg','Data added successfully');


        return redirect()->route('home');
    }


    public function EditData($id = null){
     $editData = Product::find($id);
     return view('edit-data',compact('editData'));
    }


    public function UpdateData(Request $request,$id){
        $str = [
            'book_name' => 'required|max:10',
            'book_price' => 'required|max:10',
            'book_writer' => 'required|max:10',

        ];

        $cr = [
            'book_name.required' => 'Name field mandatory',
            'book_name.max' => 'Your name cannot be more than 10 character',
            'book_price.required' => 'Price field mandatory',
            'book_price.max' => 'Price cannot be more than 10 character',
            'book_writer.required' => 'Writer Name field mandatory',
            'book_writer.max' => 'Writer name cannot be more than 10 character',

        ];

        $this->validate($request,$str,$cr);

        $product = Product::find($id);
        $product->book_name = $request->book_name;
        $product->book_price = $request->book_price;
        $product->book_writer = $request->book_writer;
        $product->save();
        Session::flash('msg','Data Updated successfully');


        return redirect()->route('home');
    }

    public function DeleteData($id = null){
        $dlt = Product::find($id);
        $dlt->delete();
        Session::flash('msg','Data Deleted successfully');
        return redirect()->route('home');
    }

}
