<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=> "admin",'as'=>'admin.'], function () {

    // Route::get('login',[AdminAuthController::class,'index'])->name('login');

    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');

    Route::get('profile',[AdminProfileController::class,'index'])->name('profile');
    Route::put('profile',[AdminProfileController::class,'updateProfile'])->name('profile.update');

    Route::put('profile/password',[AdminProfileController::class,'updatePassword'])->name('profile.password.update');

    //Slider route
    Route::resource('slider',SliderController::class);

    //Why choose us routes
    Route::resource('why-choose-us', WhyChooseUsController::class);
    Route::put('why-choose-title-update',[WhyChooseUsController::class,'updateTitle'])->name('why-choose-title.update');

    //Category routes
    Route::resource('category',CategoryController::class);
});
