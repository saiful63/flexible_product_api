<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NormalUserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;






Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('/',[AuthController::class,'register_view'])->name('register');
Route::post('/',[AuthController::class,'register'])->name('register');


Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'adminEditorSimilar'],function(){
        Route::get('/edit-data/{id}',[CrudController::class,'EditData']);
        Route::post('/update-data/{id}',[CrudController::class,'UpdateData']);
        Route::get('/user/home',[AuthController::class,'home'])->name('home');

        Route::group(['middleware'=>'adminRoleCheck'],function(){

            Route::get('/add_info',[CrudController::class,'AddData']);
            Route::post('/store-data',[CrudController::class,'StoreData']);
            Route::get('/delete-data/{id}',[CrudController::class,'DeleteData']);

        });


    });

    Route::group(['middleware'=>'userRoleCheck'],function(){
        Route::get('normal_user_home',[NormalUserController::class,'normalUserHome'])->name('normalUserHome');
        Route::post('add_to_cart',[CartController::class,'addToCart'])->name('addToCart');
        Route::get('get_cart_data',[CartController::class,'getCartData'])->name('getCartData');
        Route::get('view_added_item',[CartController::class,'viewAddedItem'])->name('viewAddedItem');
    });
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
