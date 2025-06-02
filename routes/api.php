<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected routes needs auth
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Routes

    Route::middleware(['role:admin'])->group(function () {
        Route::post('/adduser', [AuthController::class, 'createAdminInstructor']);
    });
});
