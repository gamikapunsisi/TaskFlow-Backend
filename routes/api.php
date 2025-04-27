<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController; // <-- Add this line
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController; // <-- Add this line
use App\Http\Controllers\BidController; 

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Add this route to handle user registration
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Task Routes
Route::post('/tasks', [TaskController::class, 'store']); // client posts
Route::get('/tasks', [TaskController::class, 'index']);  // taskers view

// Bid Routes
Route::post('/tasks/{task}/bids', [BidController::class, 'store']); // tasker bids
Route::get('/tasks/{task}/bids', [BidController::class, 'index']); // client sees bids