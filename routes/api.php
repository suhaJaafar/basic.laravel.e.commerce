<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'get']);
Route::post('/user/post', [UserController::class, 'post']);

Route::get('/products/all', [ProductController::class, 'all']);
Route::get('/products/{userId}', [ProductController::class, 'index']);
Route::post('/products/create', [ProductController::class, 'create']);
