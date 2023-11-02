<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');



Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/supports', SupportController::class);
});
