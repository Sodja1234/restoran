<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\QuoteRequestController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::post('/quote', [QuoteRequestController::class, 'store'])->name('quote.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('dishes', DishController::class);
    Route::get('/quotes', [QuoteRequestController::class, 'index'])->name('admin.quotes.index');
    Route::patch('/quotes/{quote}/status', [QuoteRequestController::class, 'updateStatus'])->name('admin.quotes.update-status');
});

require __DIR__.'/auth.php';
