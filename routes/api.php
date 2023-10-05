<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('login',[AuthController::class,'login'])->name('login');


Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::resource('products',ProductController::class);
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
