<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//log in access with role.
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('adminDashboard', absolute: false));
    }
    if (Auth::user()->role === 'user') {
        return redirect('/');
    }
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require place 
require __DIR__.'/frontend.php';
require __DIR__.'/backend.php';
require __DIR__.'/auth.php';
