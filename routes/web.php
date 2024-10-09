<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('log', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('products', function () {
    return view('products');
});

Route::get('create-product', function () {
    return view('create-product');
});
