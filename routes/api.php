<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReadingIntervalController;
use App\Http\Controllers\API\RecommendedBooksController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('/submit-interval', [ReadingIntervalController::class, 'submitInterval']);
    Route::get('/recommended-books', [RecommendedBooksController::class, 'getRecommendedBooks']);
});
