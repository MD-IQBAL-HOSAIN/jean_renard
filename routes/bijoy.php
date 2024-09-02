<?php

use App\Http\Controllers\Biography;
use App\Http\Controllers\Contacts;
use App\Http\Controllers\Discography;
use App\Http\Controllers\HtmlloginController;
use App\Http\Controllers\Media;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/',[TemplateController::class,'index']);
Route::get('/biography',[Biography::class,'index'])->name('biography');
Route::get('/discography',[Discography::class,'index'])->name('discography');
Route::get('/media',[Media::class,'index'])->name('media');
Route::get('/shop',[Media::class,'index'])->name('shop');
Route::get('/contacts',[Contacts::class,'index'])->name('contacts');
Route::get('/logins',[HtmlloginController::class,'index'])->name('logins');