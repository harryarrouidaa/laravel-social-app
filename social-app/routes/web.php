<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

Route::get('/', function () {
    return redirect()->route('login.view');
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

// profile routes
Route::prefix('profile')->controller(ProfileController::class)->group(function () {
    // Views
    Route::get('/upload', 'profileView')->name('profile.upload.view');
    // actions
    Route::post('/upload', 'upload')->name('profile.upload.action');
});

Route::prefix('post')->controller(PostController::class)->group(function () {
    // views
    Route::get('/all', 'posts')->name('posts.view');
});