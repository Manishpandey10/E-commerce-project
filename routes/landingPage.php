<?php

use App\Http\Controllers\LandingPage\ContactUsController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\LandingPage\ShoppingCartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');
Route::get('/shop', [LandingPageController::class, 'shop'])->name('shop.page');

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.page');
Route::post('/contact-us/submit',[ContactUsController::class , 'submit'])->name('submit.message');

Route::get('/shop-category-products/{id}', [LandingPageController::class, 'filter'])->name('shop.category');
Route::get('/product_details/{id}', [LandingPageController::class, 'productDetails'])->name('shop.details');

