<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SteamAuthController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (requires authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Steam Authentication Routes
Route::get('/auth/steam', [SteamAuthController::class, 'redirect'])->name('auth.steam');
Route::get('/auth/steam/callback', [SteamAuthController::class, 'callback']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Optional: If you want to disable the standard Laravel auth routes
// Comment out or remove the following line
// require __DIR__.'/auth.php';