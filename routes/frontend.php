<?php

use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\SignupController as FrontendSignupController;

use App\Http\Controllers\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('frontend/login', [FrontendLoginController::class, 'frontIndex'])->name('front.login');
Route::post('frontend/login', [FrontendLoginController::class, 'frontLogin'])->name('verify.front');
Route::get('frontend/logout',[FrontendLoginController::class , 'frontLogout'])->name('front.logout');
Route::get('frontend/signup', [FrontendSignupController::class, 'frontSignup'])->name('front.signup');
Route::post('frontend/signup', [FrontendSignupController::class, 'register'])->name('register.front.user');

Route::get('/dashboard',[FrontendLoginController::class, 'frontDashboard'])->name('front.dashboard');