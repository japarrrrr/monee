<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/wallets', [WalletController::class, 'index'])
    ->name('wallets.index');

    Route::get('/wallets/create', [WalletController::class, 'create'])
    ->name('wallets.create');

    Route::post('/wallets', [WalletController::class, 'store'])
    ->name('wallets.store');

    Route::get('/wallets/{id}/edit', [WalletController::class, 'edit'])
    ->name('wallets.edit');

    Route::put('/wallets/{id}', [WalletController::class, 'update'])
    ->name('wallets.update');

    Route::delete('/wallets/{id}', [WalletController::class, 'destroy'])
    ->name('wallets.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
    ->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');
});

require __DIR__.'/auth.php';
