<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageCategoryController;
use App\Http\Controllers\Admin\ManageProductController;
use App\Http\Controllers\Admin\OrderListingController;
use App\Http\Controllers\Admin\SignUpController;
use Illuminate\Support\Facades\Route;


    Route::get('admin/login',[LoginController::class, 'index'])->name('admin.login');
    Route::post('/login',[LoginController::class, 'verifyUser'])->name('verify.login');
    Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/signup',[SignUpController::class, 'index'])->name('admin.signup');
    Route::post('/signup',[SignUpController::class, 'store'])->name('admin.register');


Route::group(['prefix'=>'admin', 'middleware'=>['is.user','admin.access']],function(){
    Route::get('/dashboard',[DashboardController::class, 'show'])->name('admin.dashboard');
    
    
    //manage category routes
    Route::get('/manage-category',[ManageCategoryController::class , 'index'])->name('manage.category');
    Route::get('/add-new-category',[ManageCategoryController::class, 'show'])->name('add.category');
    Route::post('/add-new-category',[ManageCategoryController::class, 'create'])->name('register.category');
    Route::get('/edit-category/{id}',[ManageCategoryController::class, 'edit'])->name('edit.category');
    Route::post('/edit-category/{id}',[ManageCategoryController::class, 'update'])->name('submit.category');
    Route::get('/delete-category/{id}',[ManageCategoryController::class , 'delete'])->name('delete.category');
    //manage product routes 
    Route::get('/manage-product',[ManageProductController::class , 'index'])->name('manage.product');
    Route::get('/add-new-product',[ManageProductController::class, 'show'])->name('add.product');
    Route::post('/add-new-product',[ManageProductController::class, 'create'])->name('register.product');
    Route::get('/edit-product/{id}',[ManageProductController::class, 'edit'])->name('edit.product');
    Route::post('/edit-product/{id}',[ManageProductController::class, 'update'])->name('submit.product');
    Route::get('/delete-product/{id}',[ManageProductController::class, 'delete'])->name('delete.product');
    //Manage Order details route
    Route::get('/order-details',[OrderListingController::class, 'index'])->name('order.details');
    Route::post('/delivery-status-update/{id}',[OrderListingController::class, 'updateDeliveryStatus'])->name('order.updateDeliveryStautus');
    Route::get('/profile',[AdminProfileController::class , 'index'])->name('admin.profile');

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'changepassword'])->name('updated-password');
});

