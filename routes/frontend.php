<?php

use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\SignupController as FrontendSignupController;

use App\Http\Controllers\Frontend\LandingPage\ContactUsController;
use App\Http\Controllers\Frontend\LandingPage\LandingPageController;

use App\Http\Controllers\Frontend\Checkout\CheckOutController;

use App\Http\Controllers\Frontend\LandingPage\ShoppingCartController;

use App\Http\Controllers\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('frontend/login', [FrontendLoginController::class, 'frontIndex'])->name('front.login');
Route::post('frontend/login', [FrontendLoginController::class, 'frontLogin'])->name('verify.front');
Route::get('frontend/logout', [FrontendLoginController::class, 'frontLogout'])->name('front.logout');
Route::get('frontend/signup', [FrontendSignupController::class, 'frontSignup'])->name('front.signup');
Route::post('frontend/signup', [FrontendSignupController::class, 'register'])->name('register.front.user');

Route::get('/dashboard', [FrontendLoginController::class, 'frontDashboard'])->name('front.dashboard');

//for landing page 
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');
Route::get('/shop', [LandingPageController::class, 'shop'])->name('shop.page');

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.page');
Route::post('/contact-us/submit', [ContactUsController::class, 'submit'])->name('submit.message');

Route::get('/shop-category-products/{id}', [LandingPageController::class, 'filter'])->name('shop.category');
Route::get('shop/filter-by-price', [LandingPageController::class, 'priceFilter'])->name('price.filter');//filter based on price using ajax
Route::get('shop/price-low-to-high', [LandingPageController::class, 'lowPriceSort'])->name('price.filter.low');
Route::get('shop/price-above-hundred', [LandingPageController::class, 'highPriceSort'])->name('price.filter.high');

Route::get('/product_details/{id}', [LandingPageController::class, 'productDetails'])->name('shop.details');

// handling checkout pages

Route::get('/checkout/shipping-info', [CheckOutController::class, 'index'])->name('checkout.info');
Route::post('/checkout/create-order', [CheckOutController::class, 'order'])->name('create.order');
Route::get('/checkout/order-success', [CheckOutController::class, 'orderSuccess'])->name('order.success');

//Handling cart fucntionality
Route::get('/cart', [ShoppingCartController::class, 'index'])->name('shop.cart');
Route::get('/cart-add/{product_id}', [ShoppingCartController::class, 'addToCart'])->name('add.cart');

Route::get('/create-cart/{product_id}', [ShoppingCartController::class, 'createCart'])->name('create.cart');

Route::post('/increase-cart/{id}', [ShoppingCartController::class, 'increase'])->name('inc.cart');

Route::post('/cart-update/{id}', [ShoppingCartController::class, 'update'])->name('update.cart');

Route::get('/cart-delete/{id}', [ShoppingCartController::class, 'delete'])->name('delete.cart');
