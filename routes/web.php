<?php

use App\Http\Controllers\SupportController;
use App\Http\Controllers\vaga\VagaController;
use App\Models\Support;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');

Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');


Route::get('/vagas', [VagaController::class, 'showAll'])->name('vagas');
