<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/',[CartController::class,'allProduct'])->name('allProduct');
Route::get('/',[AuthController::class,'register_view'])->name('register');

Route::post('add_to_cart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('get_cart_data',[CartController::class,'getCartData'])->name('getCartData');
Route::get('view_added_item',[CartController::class,'viewAddedItem'])->name('viewAddedItem');
Route::get('getPost',[CartController::class,'getPost'])->name('getPost')->middleware('can:isAdmin');

Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login')->middleware('throttle:2,1');

    // Route::get('register',[AuthController::class,'register_view'])->name('register');
    Route::post('register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/add_info',[CrudController::class,'AddData']);
    Route::post('/store-data',[CrudController::class,'StoreData']);
    Route::get('/edit-data/{id}',[CrudController::class,'EditData']);
    Route::post('/update-data/{id}',[CrudController::class,'UpdateData']);
    Route::get('/delete-data/{id}',[CrudController::class,'DeleteData']);
});
