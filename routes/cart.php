<?php

use App\Http\Controllers\Frontend\SignupController;
use App\Http\Controllers\LandingPage\ShoppingCartController;
use Illuminate\Support\Facades\Route;

Route::get('/cart',[ShoppingCartController::class ,'index'])->name('shop.cart');
Route::get('/cart-add/{product_id}',[ShoppingCartController::class , 'addToCart'])->name('add.cart');

Route::get('/create-cart/{product_id}',[ShoppingCartController::class , 'createCart'])->name('create.cart');

Route::post('/increase-cart/{id}', [ShoppingCartController::class, 'increase'])->name('inc.cart');

Route::post('/cart-update/{id}',[ShoppingCartController::class , 'update'])->name('update.cart');

Route::get('/cart-delete/{id}',[ShoppingCartController::class , 'delete'])->name('delete.cart');