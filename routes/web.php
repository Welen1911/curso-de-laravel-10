<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\vaga\VagaController;
use App\Models\Support;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('supports.index');
});


Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/supports_create', [SupportController::class, 'create'])->name('supports.create');
    Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');

    Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
    Route::put('/supports/update/{id}', [SupportController::class, 'update'])->name('supports.update');

    Route::delete('/supports/destroy/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
});

require __DIR__ . '/auth.php';
