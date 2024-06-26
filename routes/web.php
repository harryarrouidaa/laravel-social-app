<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAuthMiddleware;
use Illuminate\Support\Facades\Route;

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
Route::prefix('profile')->middleware(isAuthMiddleware::class)->controller(ProfileController::class)->group(function () {
    // Views
    Route::get('/upload', 'profileUploadView')->name('profile.upload.view');
    Route::get('/me', 'profileView')->name('user.profile.view');
    Route::get('/edit', 'editView')->name('user.edit.view');
    // actions
    Route::post('/upload', 'upload')->name('profile.upload.action');
    Route::post('/edit', 'edit')->name('user.edit.action');
    Route::put('/update/{id}', 'update')->name('user.profile.update');
    Route::post('/skip', 'skip')->name('profile.upload.skip');
});

Route::prefix('posts')->middleware(isAuthMiddleware::class)->controller(PostController::class)->group(function () {
    // views
    Route::get('/browse', 'posts')->name('posts.view');
    Route::get('/new', 'newView')->name('posts.new.view');
    // actions
    Route::post('/new', 'newAction')->name('post.new.action');
    Route::delete('/delete/{id}', 'postDelete');
});

Route::middleware(isAuthMiddleware::class)->prefix('user')->controller(UserController::class)->group(function () {
    // views
    Route::get('/community', 'communityView')->name('community.view');
    Route::get('/show/{id}', 'show')->name('user.show.view');
    // actions
    Route::get('/community/search', 'communityView')->name('community.search');
});

Route::prefix('user')->middleware(isAuthMiddleware::class)->controller(FollowsController::class)->group(function () {
    // views
    // actions
    Route::post('/follow/{id}', 'follow')->name('user.follow');
    Route::post('/block/{id}', 'block')->name('user.block');
    Route::delete('/unfollow/{id}', 'unfollow')->name('user.unfollow');
});

Route::prefix('post')->middleware(isAuthMiddleware::class)->controller(LikeController::class)->group(function () {
    Route::post('/like/{id}', 'like')->name('user.like');
    Route::post('/unlike/{id}', 'unlike')->name('user.unlike');
});

Route::prefix('post')->middleware(isAuthMiddleware::class)->controller(CommentController::class)->group(function () {
    // views
    Route::get('/comments/{id}', 'comments')->name('post.comments.view');
    // actions
    Route::post('/comment/{post_id}', 'comment')->name('post.comment.action');
    Route::delete('/comment/delete/{id}', 'delete')->name('user.comment.delete');
});

Route::prefix('notifications')->middleware(isAuthMiddleware::class)->controller(NotificationController::class)->group(function () {
    // views
    Route::get('/all', 'all')->name('notifications.view');
    Route::get('/{id}', 'show')->name('notification.show');
    // actions
    Route::post('/{id}/check', 'check')->name('notification.check');
    Route::delete('/delete', 'delete')->name('notifications.delete');
});

Route::prefix('friend')->middleware(isAuthMiddleware::class)->controller(FriendController::class)->group(function () {
    Route::post('/add/{id}', 'add')->name('add.friend');
    Route::delete('/delete/{id}', 'delete')->name('delete.friend');
});

// routes for the chat app on react
Route::controller(ApiController::class)->group(function () {
    Route::get('/api/users', 'getUsers');
    Route::get('/api/friends/{id}', 'getFriends');  
    Route::get('/api/profile/{id}', 'getProfilePath');
});