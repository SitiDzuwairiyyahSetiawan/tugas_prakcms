<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::get('/buku/{id}', [BukuController::class, 'show']);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
Route::get('/buku/{id}/delete', [BukuController::class, 'delete']);

Route::get('/denda', [DendaController::class, 'index']);
Route::get('/denda/create', [DendaController::class, 'create']);
Route::get('/denda/{id}', [DendaController::class, 'show']);
Route::get('/denda/{id}/edit', [DendaController::class, 'edit']);
Route::get('/denda/{id}/delete', [DendaController::class, 'delete']);

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit']);
Route::get('/peminjaman/{id}/delete', [PeminjamanController::class, 'delete']);

Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/petugas/create', [PetugasController::class, 'create']);
Route::get('/petugas/{id}', [PetugasController::class, 'show']);
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit']);
Route::get('/petugas/{id}/delete', [PetugasController::class, 'delete']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::get('/siswa/{id}', [SiswaController::class, 'show']);
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);