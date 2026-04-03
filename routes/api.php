<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:5,1')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'get']);
    Route::post('/user/post', [UserController::class, 'post']);

    Route::get('/products/all', [ProductController::class, 'all']);
    Route::get('/products/{userId}', [ProductController::class, 'index']);
    Route::post('/products/create', [ProductController::class, 'create']);

    Route::get('/orders/all', [OrderController::class, 'all']);
    Route::get('/orders/{userId}', [OrderController::class, 'index']);
    Route::post('/orders/create', [OrderController::class, 'create']);
});

