<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResikoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\PenetapanKonteksController;
// use App\Http\Controllers\EvaluationsController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/penetapan-konteks', [PenetapanKonteksController::class, 'index'])->name('penetapan_konteks.index');
// Route::post('/penetapan-konteks', [PenetapanKonteksController::class, 'store'])->name('penetapan_konteks.store');
// Route::get('/evaluations/create', [EvaluationsController::class, 'create'])->name('evaluations.create');

// Route::get('/evaluations/create', [EvaluationsController::class, 'create'])->name('evaluations.create');
// Route::post('/evaluations', [EvaluationsController::class, 'store'])->name('evaluations.store');
Route::get('/penetapan-konteks', [PenetapanKonteksController::class, 'index'])->name('penetapan_konteks.index');
Route::post('/penetapan-konteks', [PenetapanKonteksController::class, 'store'])->name('penetapan_konteks.store');


Route::middleware(['auth:web'])->group(function () {
   
    Route::get('/admin/resiko', [ResikoController::class, 'index'])->name('resiko.index');
    Route::post('/store', [ResikoController::class, 'store'])->name('resiko.store');
    Route::get('/getSubKategori/{id}', [ResikoController::class, 'getSubKategori']);
    Route::get('/getKejadianRisiko/{id}', [ResikoController::class, 'getKejadianRisiko']);
    Route::get('/risiko/{id}/edit', [ResikoController::class, 'edit'])->name('resiko.edit');
    Route::put('/risiko/{id}', [ResikoController::class, 'update'])->name('resiko.update');
    Route::delete('/risiko/{id}', [ResikoController::class, 'destroy'])->name('resiko.destroy');
});

