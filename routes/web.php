<?php

use App\Http\Controllers\{BookController, DataBukuController, ProfileController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home

Route::get('/bukutamu', [BookController::class, 'index'])->name('home')->middleware('auth');
Route::post('/bukutamu', [BookController::class, 'store'])->name('home.store')->middleware('auth');


// Informasi
Route::view('about', 'book.about')->name('about');
Route::view('contact', 'book.contact')->name('contact');

// Route::middleware('auth')->group(function () {
Route::view('/', 'dashboard')->name('dashboard')->middleware('auth');
Route::get('buku', [DataBukuController::class, 'index'])->name('buku.index')->middleware('auth', 'admin');
Route::post('buku', [DataBukuController::class, 'index'])->name('buku.index')->middleware('auth', 'admin');
Route::get('buku/{id}/edit', [DataBukuController::class, 'edit'])->name('buku.edit')->middleware('auth', 'admin');
Route::put('buku/{id}', [DataBukuController::class, 'update'])->name('buku.update')->middleware('auth', 'admin');
Route::delete('buku/{id}', [DataBukuController::class, 'destroy'])->name('buku.destroy')->middleware('auth', 'admin');


Route::get('laporan', [DataBukuController::class, 'laporan'])->name('buku.laporan')->middleware('auth', 'admin');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');
// });

require __DIR__ . '/auth.php';
