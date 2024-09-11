<?php

use App\Http\Controllers\backend\CaptativeMomentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () {
    // backend route start
    // Route::get('/cards',[CardsController::class,'index'])->name('cards');
    // Route::get('/buttons',[ButtonsController::class,'index'])->name('buttons');
    Route::get('/adminDashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::resource('/posts', PostController::class)->names('posts');


    // Captative Routes
    Route::controller(CaptativeMomentController::class)->group(function () {
        Route::get('captivating_moments', 'index')->name('captivating.index');
        Route::get('captivating_moments/create', 'create')->name('captivating.create');
        Route::post('captivating_moments/store', 'store')->name('captivating.store');
        Route::get('captivating_moments/edit/{id}', 'edit')->name('captivating.edit');
        Route::put('captivating_moments/update/{id}', 'update')->name('captivating.update'); // Updated this line
        Route::delete('captivating_moments/{id}', 'destroy')->name('captivating.destroy'); // Updated route path
    });

    // backend route end
});
