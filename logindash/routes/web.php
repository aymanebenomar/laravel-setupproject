<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');


// Auth pages

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// Posts (feed public, actions protected)

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'store'])->name('posts.show');

Route::middleware('auth')->group(function() {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});



// dash 
// Route::middleware('auth')->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');