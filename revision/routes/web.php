<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stg', function () {
    return view('stg');
})->name('stg');