<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\Biography;
use App\Http\Controllers\frontend\ChangepasswordController;
use App\Http\Controllers\frontend\CommunityController;
use App\Http\Controllers\frontend\ContactsController;
use App\Http\Controllers\frontend\CustomerSupportController;
use App\Http\Controllers\frontend\DiscographyController;
use App\Http\Controllers\frontend\FaqController;
use App\Http\Controllers\frontend\ForgetpasswordController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\MediaController;
use App\Http\Controllers\frontend\PrivacyController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\SignupController;
use App\Http\Controllers\frontend\TemplateController;
use App\Http\Controllers\frontend\TermsController;




//frontend routes starts.
Route::get('/', [TemplateController::class, 'index']);
Route::get('/biography', [Biography::class, 'index'])->name('biography');
Route::get('/discography', [DiscographyController::class, 'index'])->name('discography');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

//contacts start
Route::get('/contacts1', [ContactsController::class, 'index'])->name('contacts1');
Route::POST('/contacts2', [ContactsController::class, 'store'])->name('contacts2.store');
//smtp start
Route::post('/smtpcontact/send', [ContactsController::class, 'sendEmail'])->name('contact.send');
//smtp end
//contacts end

Route::get('/logins', [LoginController::class, 'index'])->name('logins');

Route::get('/registers', [SignupController::class, 'index'])->name('registers');
Route::post('/register', [SignupController::class, 'register'])->name('register');

Route::get('/forgetpass', [ForgetpasswordController::class, 'index'])->name('forgetpass');
Route::get('/passchange', [ChangepasswordController::class, 'index'])->name('passchange');
Route::get('/Custo', [CustomerSupportController::class, 'index'])->name('customersupport');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/community', [CommunityController::class, 'index'])->name('community');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');






//frontend routes end.
