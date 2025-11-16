<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/registerpage',function(){
    return view('templates.register');
});

Route::get('/loginpage',function(){
    return view('templates.login');
});

Route::get('/',function(){
    return view('templates.index');
});

Route::get('/makeshop',function(){
    return view('templates.makeShop');
});

Route::get('/shopdashboard',function(){
    return view('templates.shopDashboard');
});

Route::get('/updateshop',function(){
    return view('templates.updateShop');
});

Route::get('/updateproduct',function(){
    return view('templates.updateProduct');
});

Route::get('/addproduct',function(){
    return view('templates.addProduct');
});
