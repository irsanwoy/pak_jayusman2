<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute untuk registrasi dengan RegisterController
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Rute lainnya
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
});

// Rute bawaan Laravel untuk autentikasi
require __DIR__.'/auth.php';
