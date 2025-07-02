<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

    // Notes
    Route::get('/notes/store', [NoteController::class, 'store'])->name('notes.store');
    Route::patch('/notes/update/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('notes/destroy/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    //Profile
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
