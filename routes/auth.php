<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserInterestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('login', LoginController::class);
// Route::post('logout', LogoutController::class);
Route::post('register', RegisterController::class);

Route::post('login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum', 'role:admin'])->get('/users', function (Request $request) {
    // Retrieve all users
    $users = User::all();

    // Return users as JSON
    return response()->json($users);
});


// Route::post('/user-interest', [UserInterestController::class, 'store']);
