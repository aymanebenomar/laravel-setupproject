<?php

use Illuminate\Support\Facades\Route;

// This is the path to import the conroller
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});


// Controller that has all the Routes in One
Route::resource('posts', PostController::class);


// apply the middleware to the route
// Route::middleware(['auth', 'checkdirecteur'])->resource('user', usercontroller:class);


