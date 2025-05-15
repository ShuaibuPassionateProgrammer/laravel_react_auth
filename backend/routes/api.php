<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Route::post("/register", [UsersController::class, 'register']);
// Route::post("/login", [UsersController::class, 'login']);
// Route::get("/dashboard", [UsersController::class, 'dashboard']);
// Route::post("/logout", [UsersController::class, 'logout']);

Route::middleware('auth:sanctum')->get("/user", function(Request $request) {
    return $request->user();
});

Route::post("/signup", [AuthController::class, 'signup']);
Route::post("/login", [AuthController::class, 'login']);