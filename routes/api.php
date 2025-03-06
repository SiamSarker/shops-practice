<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->get('me', [AuthController::class, 'me']);

// Shop Routes (Public)
Route::get('shops', [ShopController::class, 'index']);
Route::get('shops/{id}', [ShopController::class, 'show']);

// Admin Protected Shop Routes
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('shops', [ShopController::class, 'store']);
    Route::put('shops/{id}', [ShopController::class, 'update']);
    Route::delete('shops/{id}', [ShopController::class, 'destroy']);
});
