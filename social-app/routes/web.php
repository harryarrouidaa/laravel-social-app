<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    Route::get('/upload', 'profileUploadView')->name('profile.upload.view');
    Route::get('/me', 'profileView')->name('user.profile.view');
    Route::get('/edit', 'editView')->name('user.edit.view');
    // actions
    Route::post('/upload', 'upload')->name('profile.upload.action');
    Route::post('/edit', 'edit')->name('user.edit.action');
});

Route::prefix('posts')->controller(PostController::class)->group(function () {
    // views
    Route::get('/browse', 'posts')->name('posts.view');
    Route::get('/new', 'newView')->name('posts.new.view');
    // actions
    Route::post('/new', 'newAction')->name('post.new.action');
    Route::delete('/delete/{id}', 'postDelete');
});

Route::prefix('community')->controller(UserController::class)->group(function () {
    // views
    Route::get('', 'communityView')->name('community.view');
});