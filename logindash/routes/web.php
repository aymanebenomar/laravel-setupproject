<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->get('/dashboard', function()
{
    return view('/dashboard');

})->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout']);