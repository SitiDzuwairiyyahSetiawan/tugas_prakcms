<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// Authentication Routes
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);


Route::get('/home', function () {
    return view('home');
});

// Buku Routes
Route::resource('buku', BukuController::class);
Route::resource('buku', BukuController::class)->except(['destroy']);

// Siswa Routes
Route::resource('siswa', SiswaController::class);
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::get('siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');

// Petugas Routes
Route::resource('petugas', PetugasController::class);
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
Route::get('/petugas/{id}', [PetugasController::class, 'show'])->name('petugas.show');

// Peminjaman Routes
Route::resource('peminjaman', PeminjamanController::class);
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

// Denda Routes
Route::resource('denda', DendaController::class);
Route::delete('/denda/{id}', [DendaController::class, 'destroy'])->name('denda.destroy');
