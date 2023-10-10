<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register_view(){
        return view('auth.register');
    }



    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
    // Save data
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'role'=>User::USER,
        'password'=> Hash::make($request->password)
    ]);

    // login user to dashboard
    if(Auth::attempt($request->only('email','password')))
       {
        if(Auth::user()->role === User::ADMIN){
            return redirect('home');
        }else if(Auth::user()->role === User::EDITOR){
            //return redirect()->route('home');
            return redirect('home');
        }
        else if(Auth::user()->role === User::USER){
            return redirect()->route('normalUserHome');
        }

       }

    return redirect('register')->withError('Error');
    }



    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

    if(Auth::attempt($request->only('email','password')))
       {
        //return Auth::user()->name;
        if(Auth::user()->role === User::ADMIN){
            return redirect()->route('home');
        }else if(Auth::user()->role === User::EDITOR){
            return redirect()->route('home');
        }
        else if(Auth::user()->role === User::USER){
            return redirect()->route('normalUserHome');
        }
       }

    return redirect('login')->withError('Login details are not valid');
    }





    public function home(){
        // return view('home');
        $products = Product::all();
        return view('Home',compact('products'));
    }

    public function editorHome(){
        $products = Product::all();
        return view('Home',compact('products'));
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

}



