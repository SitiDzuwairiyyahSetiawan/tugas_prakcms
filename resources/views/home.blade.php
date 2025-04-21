@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Selamat Datang di Sistem Perpustakaan</h2>
    <p>Ini adalah sistem perpustakaan yang memungkinkan Anda untuk mengelola buku, siswa, petugas, peminjaman, dan denda.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah Buku</h5>
                </div>
                <div class="card-body">
                    <p>{{ App\Models\Buku::all()->count() }} Buku Tersedia</p>
                    <a href="/buku" class="btn btn-primary">Lihat Daftar Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah Siswa</h5>
                </div>
                <div class="card-body">
                    <p>{{ App\Models\Siswa::all()->count() }} Siswa Terdaftar</p>
                    <a href="/siswa" class="btn btn-primary">Lihat Daftar Siswa</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah Petugas</h5>
                </div>
                <div class="card-body">
                    <p>{{ App\Models\Petugas::all()->count() }} Petugas Terdaftar</p>
                    <a href="/petugas" class="btn btn-primary">Lihat Daftar Petugas</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah Peminjaman</h5>
                </div>
                <div class="card-body">
                    <p>{{ App\Models\Peminjaman::all()->count() }} Peminjaman Terdaftar</p>
                    <a href="/peminjaman" class="btn btn-primary">Lihat Daftar Peminjaman</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah Denda</h5>
                </div>
                <div class="card-body">
                    <p>{{ App\Models\Denda::all()->count() }} Denda Terdaftar</p>
                    <a href="/denda" class="btn btn-primary">Lihat Daftar Denda</a>
                </div>
            </div>
        </div>
    </div>
@endsection