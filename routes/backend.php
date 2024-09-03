<?php

use App\Http\Controllers\backend\ButtonsController;
use App\Http\Controllers\backend\CardsController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;


// backend route start 
Route::get('/adminDashboard',[DashboardController::class,'index'])->name('adminDashboard');
Route::get('/cards',[CardsController::class,'index'])->name('cards');
Route::get('/buttons',[ButtonsController::class,'index'])->name('buttons');


// backend route end 
