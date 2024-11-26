<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/registration/ju', [EventController::class, 'juRegistration'])->name('register.ju');
Route::get('/registration/others', [EventController::class, 'otherRegistration'])->name('register.other');
