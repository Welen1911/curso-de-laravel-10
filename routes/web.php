<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\vaga\VagaController;
use App\Models\Support;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('supports.index');
});

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');



Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');

Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');



Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');



Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');

Route::put('/supports/update/{id}', [SupportController::class, 'update'])->name('supports.update');



Route::delete('/supports/destroy/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');



Route::get('/vagas', [VagaController::class, 'showAll'])->name('vagas');
