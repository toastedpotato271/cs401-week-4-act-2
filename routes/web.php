<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/create-sample-post', [BlogController::class, 'createSamplePost'])->name('blog.create-sample');
