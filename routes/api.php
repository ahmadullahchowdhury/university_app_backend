<?php

use App\Http\Controllers\SubjectAreaController;
use App\Http\Controllers\UserInterestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return true;
// });

// Route::get('/users', function (Request $request) {
//     return response()->json([
//         'name' => 'John Doe',
//         'email' => 'kowcher' ]);
// });

Route::post('/user-interest', [UserInterestController::class, 'store']);
Route::middleware(['auth:sanctum', 'role:admin'])->get('/gps-data', [UserInterestController::class, 'getGpsData']);


Route::middleware(['auth:sanctum', 'role:admin'])->get('/all-user-interest', [UserInterestController::class, 'index']);

Route::middleware(['auth:sanctum', 'role:admin'])->get('/subject-areas', [SubjectAreaController::class, 'index']);
Route::middleware(['auth:sanctum', 'role:admin'])->post('/subject-areas', [SubjectAreaController::class, 'store']);
Route::middleware(['auth:sanctum', 'role:admin'])->get('/subject-areas/{id}', [SubjectAreaController::class, 'show']);
Route::middleware(['auth:sanctum', 'role:admin'])->post('/subject-areas/{id}', [SubjectAreaController::class, 'update']);
Route::middleware(['auth:sanctum', 'role:admin'])->delete('/subject-areas/{id}', [SubjectAreaController::class, 'destroy']);
