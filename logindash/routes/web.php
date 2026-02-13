<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function ($email = 'Enter Your Email') {
    return view('login', [
        'email' => $email
    ]);
});


Route::get('/test', function($test = 'Test')
{
    return view('test', [
        'test' => $test
    ]);
});
