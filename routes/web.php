<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Front Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('front.home');
});

Route::get('/catalog', function () {
    return view('front.products.index');
});

/*
|--------------------------------------------------------------------------
| Cart + Checkout
|--------------------------------------------------------------------------
*/

Route::get('/cart', function () {
    return view('cart');
});

Route::post('/checkout', [CheckoutController::class, 'checkout']);

/*
|--------------------------------------------------------------------------
| Inquiry
|--------------------------------------------------------------------------
*/

Route::post('/send-inquiry', [InquiryController::class,'store']);

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'dashboard']);

Route::get('/admin/orders', [AdminController::class, 'orders']);

Route::get('/admin/inquiries', [AdminController::class, 'inquiries']);