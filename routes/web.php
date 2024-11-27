<?php

use App\Http\Controllers\{ProfileController, BondsController};
use Illuminate\Support\Facades\Route;

/* Global Routes */
Route::get('/', function () {
    return view('welcome');
});

/* Admin & User Routes */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BondsController::class, 'index'])->name('dashboard');
});

/* Only Admin Routes */
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/view-bound', [BondsController::class, 'viewBound'])->name('view-bound');
    Route::patch('/add-bound', [BondsController::class, 'addBound'])->name('add-bound');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
