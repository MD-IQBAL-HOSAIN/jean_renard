<?php

use App\Http\Controllers\backend\ButtonsController;
use App\Http\Controllers\backend\Captivating_momentController;
use App\Http\Controllers\backend\CardsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () {
    // backend route start 
    Route::get('/adminDashboard',[DashboardController::class,'index'])->name('adminDashboard');
    // Route::get('/cards',[CardsController::class,'index'])->name('cards');
    // Route::get('/buttons',[ButtonsController::class,'index'])->name('buttons');
    Route::resource('/posts', PostController::class)->names('posts');
    Route::resource('/captivating_moments', Captivating_momentController::class)->names('captivating_moments');

    // backend route end 
});
