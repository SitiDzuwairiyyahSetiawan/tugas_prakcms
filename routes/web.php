<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DendaController;

Route::get('/', function () {
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

Route::get('/pendaftaran-ktp', function () {
    return 'Selamat datang di halaman Pendaftaran KTP Online!';
})->middleware('check.age');


Route::get('/upload', [ImageController::class, 'create'])->name('image.upload.form');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/image/{id}', [ImageController::class, 'destroy'])->name('image.delete');