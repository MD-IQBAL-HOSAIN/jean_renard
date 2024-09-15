<?php

use App\Http\Controllers\backend\AlbumController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CaptativeMomentController;
use App\Http\Controllers\backend\ContactsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// backend route start
Route::middleware(['auth', 'admin'])->group(function () {
    //Admin Dashboard
    Route::get('/adminDashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    //post routes
    Route::resource('/posts', PostController::class)->names('posts');
});
// Captative Routes
Route::controller(CaptativeMomentController::class)->group(function () {
    Route::get('captivating_moments', 'index')->name('captivating.index');
    Route::get('captivating_moments/create', 'create')->name('captivating.create');
    Route::post('captivating_moments/store', 'store')->name('captivating.store');
    Route::get('captivating_moments/edit/{id}', 'edit')->name('captivating.edit');
    Route::put('captivating_moments/update/{id}', 'update')->name('captivating.update');
    Route::delete('captivating_moments/{id}', 'destroy')->name('captivating.destroy');
});
// Album Routes
Route::controller(AlbumController::class)->group(function () {
    Route::get('album', 'index')->name('album.index');
    Route::get('album/create', 'create')->name('album.create');
    Route::post('album/store', 'store')->name('album.store');
    Route::get('album/edit/{id}', 'edit')->name('album.edit');
    Route::put('album/update/{id}', 'update')->name('album.update');
    Route::delete('album/{id}', 'destroy')->name('album.destroy');
});

// Contacts Routes

Route::controller(ContactsController::class)->group(function () {
    Route::get('/contact', 'index')->name('contacts.index');
    Route::get('/contact/{id}', 'show')->name('contacts.show');
    Route::delete('/contact/{id}', 'destroy')->name('contacts.destroy');
});

// Blog Routes
Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'index')->name('blog.index');
    Route::get('blog/create', 'create')->name('blog.create');
    Route::post('blog/store', 'store')->name('blog.store');
    Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
    Route::put('blog/update/{id}', 'update')->name('blog.update');
    Route::delete('blog/{id}', 'destroy')->name('blog.destroy');
});

// backend route end
