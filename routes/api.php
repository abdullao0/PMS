<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::post('/shop/store',[ShopController::class,'store']);
    Route::get('/shop/index',[ShopController::class,'index'])->middleware('CheckRole');
    Route::get('/shop/show/{shop_id}',[ShopController::class,'show']);
    Route::put('/shop/update/{shop_id}',[ShopController::class,'update']);
    Route::delete('/shop/destroy/{shop_id}',[ShopController::class,'destroy']);


    Route::post('/product/store',[ProductController::class,'store']);
    Route::get('/product/index',[ProductController::class,'index'])->middleware('CheckRole');
    Route::get('/product/show/{product_id}',[ProductController::class,'show']);
    Route::put('/product/update/{product_id}',[ProductController::class,'update']);
    Route::delete('/prodcut/deactive/{product_id}',[ProductController::class,'deactiveate']);
    Route::post('/product/category/{product_id}',[ProductController::class,'addCategoryToProduct']);
    Route::get('/product/category/{product_id}',[ProductController::class,'showProductCategories']);
    Route::delete('/prodcut/destroy/{product_id}',[ProductController::class,'destroy'])->middleware('CheckRole');

});
