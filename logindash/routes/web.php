
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Home (public)
Route::get('/', [PostController::class, 'index'])->name('home');

// AUTH ONLY FOR GUESTS
Route::middleware('guest.session')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout (only logged users)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// POSTS

Route::get('/posts', function () {
    return view('posts.index');
});



Route::middleware('session.login')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');