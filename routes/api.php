<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'get']);
Route::post('/user/post', [UserController::class, 'post']);

Route::get('/products/all', [ProductController::class, 'all']);
Route::get('/products/{userId}', [ProductController::class, 'index']);
Route::post('/products/create', [ProductController::class, 'create']);

Route::get('/orders/all', [OrderController::class, 'all']);
Route::get('/orders/{userId}', [OrderController::class, 'index']);
Route::post('/orders/create', [OrderController::class, 'create']);
