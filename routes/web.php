<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumniPrakerinController; // <-- TAMBAHKAN INI
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

    // --- TAMBAHKAN ROUTE UNTUK ALUMNI DI SINI ---
    // Kita gunakan route resource, karena controller kita sudah resource
    Route::resource('alumni', AlumniPrakerinController::class);
    // ---------------------------------------------
    
    // --- TAMBAHKAN ROUTE UNTUK LOGS DI SINI ---
    Route::get('activity-logs', [App\Http\Controllers\ActivityLogController::class, 'index'])
         ->name('logs.index');
    // ------------------------------------------
});

require __DIR__.'/auth.php';