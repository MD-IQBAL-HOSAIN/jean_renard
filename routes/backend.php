<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;


// backend route start 
Route::get('/adminDashboard',[DashboardController::class,'index'])->name('adminDashboard');

// backend route end 
