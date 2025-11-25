<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('templates.index');
});
Route::get('/index',function(){
    return view('templates.index');
})->name('index');
Route::post('/Contact',[MailController::class,'Contact'])->name('Contact');

Route::get('/registerpage',function(){
    return view('templates.register');
})->name('registerpage');

    Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('/loginpage',function(){
    return view('templates.login');
})->name('loginpage');
    Route::post('loginpage',[UserController::class,'login'])->name('login');


Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum')->name('logout');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/activeproducts',[MailController::class,'activeproducts'])->name('activeproducts');
    Route::get('/unactiveproducts',[MailController::class,'unactiveproducts'])->name('unactiveproducts');


    Route::get('/makeshoppage',function(){
        return view('templates.makeShop');
    })->name('makeshoppage');
        Route::post('makeshop',[ShopController::class,'store'])->name('makeshop');


    Route::get('/shopdashboard', function() {
        $shop = Auth::user()->shop;
        $products = $shop->products()
            ->with('categories') 
            ->where('isActive', true)
            ->get();

        return view('templates.shopDashboard', compact('products', 'shop'));
    })->name('shopdashboard');



    Route::get('/updateshoppage/{shop_id}',function(){
        $id = Auth::user()->shop->id;
        return view('templates.shopInfo',compact('id'));
    })->name('shopInfoPage');
        Route::post('updateshop/{shop_id}',[ShopController::class,'update'])->name('updateshop');


    Route::get('/updateproductpage/{product_id}', function ($product_id) {
        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        return view('templates.updateProduct', compact('product','categories'));
    })->name('updateproductpage');


        Route::put('updateproduct/{product_id}',[ProductController::class,'update'])->name('updateproduct');


    Route::get('/addproductpage',function(){

        $categories = Category::all();
        return view('templates.addProduct',compact('categories'));
    })->name('addproductpage');

        Route::post('addproduct',[ProductController::class,'store'])->name('addproduct');

        Route::put('deactiveate/{product_id}',[ProductController::class,'deactiveate'])->name('deleteproduct');

 });