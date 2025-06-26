<?php

use App\Http\Controllers\Frontend\SignupController as FrontendSignupController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\ForgetPasswordController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\SignupController;
use App\Http\Controllers\Users\UserProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/login', [LoginController::class, 'index'])->name('users.login');

Route::group(['prefix'=>'users', 'middleware'=>'auth.custom'],function(){
    
    Route::get('/signup', [SignupController::class, 'index'])->name('user.signup');
    // Route::post('/login', [LoginController::class, 'verifyUser'])->name('verify.user');
    Route::post('/signup', [SignupController::class, 'registerUser'])->name('register.user');
});

Route::group(['prefix' => 'users', 'middleware'=>['is.admin','auth.access']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('users.dashboard');
    Route::get('/user-logout',[LoginController::class , 'logout'])->name('user.logout');
    // Route::get('/forget-password',[ForgetPasswordController::class, 'index'])->name('forgot.password');
    // Route::post('/forget-password',[ForgetPasswordController::class, 'changePassword'])->name('update.password');
    Route::get('/profile',[UserProfileController::class , 'index'])->name('user.profile');
    Route::get('/manage-order',[OrderController::class, 'index'])->name('user.order');
    Route::get('/order-details/{id}',[OrderController::class, 'details'])->name('user.order.details');
    Route::get('/return-order/{id}',[OrderController::class ,'returnOrder'])->name('user.return.order');
    Route::post('/return-order/{id}',[OrderController::class ,'returnRequest'])->name('order.return.request');
    Route::get('/cancel-order/{id}',[OrderController::class ,'cancelOrder'])->name('user.cancel.order');
    Route::post('/cancel-order/{id}',[OrderController::class ,'cancelRequest'])->name('request.cancel.order');
});
