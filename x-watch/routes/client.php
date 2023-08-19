<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Client\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');;
Route::get('/thuong-hieu.html', [HomeController::class, 'brands']);
Route::post('/post-brands', [HomeController::class, 'getBrands'])->name('getBrands');
