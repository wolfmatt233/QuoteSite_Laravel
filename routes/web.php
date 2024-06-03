<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [QuoteController::class, 'index'])->name('dashboard');
    Route::get('/add', function () {
        return view('add');
    })->name('add');
    Route::get('/manualAdd', function () {
        return view('manualAdd');
    })->name('manualAdd');
    Route::post('/save', [QuoteController::class, 'saveQuote'])->name('save');
    Route::post('/saveManual', [QuoteController::class, 'saveQuoteManual'])->name('saveManual');
    Route::delete('/delete/{id}', [QuoteController::class, 'deleteQuote'])->name('delete');
    Route::post('/edit/{id}', [QuoteController::class, 'editQuote'])->name('edit');
    Route::put('/updateQuote/{id}', [QuoteController::class, 'updateQuote'])->name('updateQuote');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
