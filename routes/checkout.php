<?php

use App\Http\Controllers\Checkout\CheckOutController;
use Illuminate\Support\Facades\Route;


    Route::get('/checkout/shipping-info',[CheckOutController::class, 'index'])->name('checkout.info');
    Route::post('/checkout/create-order',[CheckOutController::class, 'order'])->name('create.order');
    Route::get('/checkout/order-success',[CheckOutController::class, 'orderSuccess'])->name('order.success');
