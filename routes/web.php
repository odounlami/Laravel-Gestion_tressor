<?php

use App\Http\Controllers\TresorController;
use Illuminate\Support\Facades\Route;

Route::prefix('/tresor')->name('tresor.')->group(function () {
    Route::get('/', [TresorController::class, 'tresorTable'])->name('table');
    Route::get('/creer', [TresorController::class, 'create'])->name('create');
    Route::post('/creer', [TresorController::class, 'store'])->name('store');
    Route::get('/creer/{oeuvre}/modifier', [TresorController::class, 'edit'])->name('edit');
    Route::put('/creer/{oeuvre}/modifier', [TresorController::class, 'modifier'])->name('modifier');
    Route::delete('/creer/{oeuvre}/supprimer', [TresorController::class, 'supprimer'])->name('supprimer');
});





