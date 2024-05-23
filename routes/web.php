<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [QuoteController::class, 'index'])->name('dashboard');
    Route::get('/add', [QuoteController::class, 'getAdd'])->name('add');
    Route::post('/saveQuote', [QuoteController::class, 'saveQuote'])->name('saveQuote');
});

Route::middleware('auth')->group(function () {
    Route::patch('/quote', [ProfileController::class, 'add'])->name('quote.add');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
