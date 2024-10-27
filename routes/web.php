<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
Route::get('/index', [ClientController::class, 'index'])->name('client.index');
Route::get('/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/clients', [ClientController::class, 'store'])->name('client.store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('client.destroy');



Route::get('/clients/{id}/accounts/create', [CompteController::class, 'createAccount'])->name('client.accounts.create');
Route::post('/clients/{id}/accounts', [CompteController::class, 'storeAccount'])->name('client.accounts.store');
Route::get('/comptes', [CompteController::class, 'compte'])->name('compte.index');


Route::get('/comptes/{compte}/edit', [CompteController::class, 'edit'])->name('compte.edit');
Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name('compte.update');
Route::delete('/comptes/{compte}', [CompteController::class, 'destroy'])->name('compte.destroy');



Route::get('client/{id}/details', [ClientController::class, 'showDetails'])->name('details');
