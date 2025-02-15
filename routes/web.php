<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResikoController;

Route::get('/', [ResikoController::class, 'index'])->name('resiko.index');
Route::post('/store', [ResikoController::class, 'store'])->name('resiko.store');
Route::get('/getSubKategori/{id}', [ResikoController::class, 'getSubKategori']);
Route::get('/getKejadianRisiko/{id}', [ResikoController::class, 'getKejadianRisiko']);
Route::get('/risiko/{id}/edit', [ResikoController::class, 'edit'])->name('resiko.edit');
Route::put('/risiko/{id}', [ResikoController::class, 'update'])->name('resiko.update');
Route::delete('/risiko/{id}', [ResikoController::class, 'destroy'])->name('resiko.destroy');
