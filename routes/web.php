<?php

use App\Http\Controllers\Auuth\LoginController;
use App\Http\Controllers\Auuth\LogoutController;
use App\Http\Controllers\Auuth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home
Route::get('/', function () {
    return view('home');
})->name('home');
//logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authcheck']);

//Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

// Likes
Route::post('/posts/{post}/like', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/like', [PostLikeController::class, 'delete'])->name('posts.like');

// Users Post
Route::get('users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');
