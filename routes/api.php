<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\vaga\VagaController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vagas', [VagaController::class, 'showApi'])->name('vagas');

Route::get('/supports/create', [SupportController::class, 'createApi']);

Route::get('/supports/{id}', [SupportController::class, 'showApi'])->name('supports.show');

Route::get('/supports', [SupportController::class, 'indexApi'])->name('supports.index');

Route::post('/supports/store', [SupportController::class, 'storeApi']);

Route::put('/supports/update/{id}', [SupportController::class, 'updateApi']);

Route::delete('/supports/destroy/{id}', [SupportController::class, 'destroyApi']);