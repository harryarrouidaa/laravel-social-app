<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::prefix('users')->controller(AuthController::class)->group(function () {
    // Views
    Route::get('/login', 'loginView')->name('login.view');
    Route::get('/register', 'registerView')->name('register.view');
    // actions 
    Route::post('/login', 'login')->name('login.action');
    Route::post('/register', 'register')->name('register.action');
    Route::post('/logout', 'logout')->name('logout.action');
});