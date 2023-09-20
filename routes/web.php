<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Frontend Controllers start

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('/account', [App\Http\Controllers\FrontendController::class, 'account'])->name('account');

// Frontend Controllers end


// Customer Controller start
Route::post('/customerregistration', [App\Http\Controllers\CustomerController::class, 'customerregistration'])->name('customerregistration');
// Customer Controller end

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes start

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/photo/upload', [App\Http\Controllers\ProfileController::class, 'profile_photo_upload']);
Route::post('/profile/cover/upload', [App\Http\Controllers\ProfileController::class, 'cover_photo_upload']);
Route::post('/password/change', [App\Http\Controllers\ProfileController::class, 'password_change']);
Route::post('/phone/number/add', [App\Http\Controllers\ProfileController::class, 'phone_number_add']);
Route::post('/code/confirm', [App\Http\Controllers\ProfileController::class, 'code_confirm']);
Route::get('/resend/code', [App\Http\Controllers\ProfileController::class, 'resend_code']);
Route::get('/phone/number/verify', [App\Http\Controllers\ProfileController::class, 'phone_number_verify']);

// Profile Routes end

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
