<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('templates.index');
});
Route::post('/Contact',[UserController::class,'Contact'])->name('Contact');


Route::get('/registerpage',function(){
    return view('templates.register');
})->name('registerpage');

    Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('/loginpage',function(){
    return view('templates.login');
})->name('loginpage');
    Route::post('login',[UserController::class,'login'])->name('login');


Route::post('logout',[UserController::class,'logout']);



Route::get('/makeshoppage',function(){
    return view('templates.makeShop');
})->name('makeshoppage');
    Route::post('makeshop',[ShopController::class,'store'])->name('makeshop');


Route::get('/shopdashboard',function(){
    $products = Auth::user()->shop->products ?? collect();
    $shop = Auth::user()->shop;

    return view('templates.shopDashboard',compact('products','shop'));
})->name('shopdashboard');



Route::get('/updateshoppage/{shop_id}',function(){
    $id = Auth::user()->shop->id;
    return view('templates.updateShop',compact('id'));
})->name('updateshoppage');
    Route::post('updateshop/{shop_id}',[ShopController::class,'update'])->name('updateshop');


Route::get('/updateproductpage/{product_id}',function(){
    return view('templates.updateProduct');
})->name('updateproductpage');
    Route::post('updateproduct/{product_id}',[ProductController::class,'update'])->name('updateproduct');


Route::get('/addproductpage',function(){
    return view('templates.addProduct');
})->name('addproductpage');
    Route::post('addproduct',[ProductController::class,'store'])->name('addproduct');

