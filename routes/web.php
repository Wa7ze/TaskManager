<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home'); // Change 'welcome' to 'home'
})->name('home');

Route::resource('tasks', TaskController::class);
Route::resource('products', ProductController::class);
