<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

Auth::routes();

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/registration/ju', [EventController::class, 'juRegistration'])->name('register.ju');
Route::get('/registration/others', [EventController::class, 'otherRegistration'])->name('register.other');


Route::get('/payment/bkash', [PaymentController::class, 'payment'])->name('url-pay');
Route::post('/payment/bkash/create', [PaymentController::class, 'createPayment'])->name('url-create');
Route::get('/payment/bkash/callback', [PaymentController::class, 'callback'])->name('url-callback');

