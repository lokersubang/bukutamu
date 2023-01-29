<?php

use App\Http\Controllers\{BookController, DataBukuController, ProfileController};
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [BookController::class, 'index'])->name('home');
Route::post('/', [BookController::class, 'store'])->name('home.store');

// Informasi
Route::view('about', 'book.about')->name('about');
Route::view('contact', 'book.contact')->name('contact');

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('buku', [DataBukuController::class, 'index'])->name('buku.index');
    Route::post('buku', [DataBukuController::class, 'index'])->name('buku.index');
    Route::get('buku/{id}/edit', [DataBukuController::class, 'edit'])->name('buku.edit');
    Route::put('buku/{id}', [DataBukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [DataBukuController::class, 'destroy'])->name('buku.destroy');


    Route::get('laporan', [DataBukuController::class, 'laporan'])->name('buku.laporan');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
