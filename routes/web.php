<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('front.home');
});

Route::get('/catalog', function () {
    return view('front.products.index');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/checkout', [OrderController::class, 'store']);