@extends('layouts.app')

@section('title', 'Dashboard - Sistem Perpustakaan')

@section('content')
<div class="container">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 bg-light rounded-3">
                <div class="container-fluid py-3">
                    <h1 class="display-5 fw-bold">Selamat Datang di Sistem Perpustakaan</h1>
                    <p class="col-md-8 fs-4">Sistem manajemen perpustakaan digital untuk sekolah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row mb-4">
        <div class="col-md-2 mb-3">
            <a href="/buku" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                    <h5>Daftar Buku</h5>
                </div>
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/siswa" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3 text-success"></i>
                    <h5>Data Siswa</h5>
                </div>
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/petugas" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-user-shield fa-3x mb-3 text-info"></i>
                    <h5>Data Petugas</h5>
                </div>
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/peminjaman" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-clipboard-list fa-3x mb-3 text-warning"></i>
                    <h5>Peminjaman</h5>
                </div>
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/denda" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle fa-3x mb-3 text-danger"></i>
                    <h5>Denda</h5>
                </div>
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/peminjaman/create" class="card text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <i class="fas fa-plus-circle fa-3x mb-3 text-secondary"></i>
                    <h5>Transaksi Baru</h5>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Books -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Koleksi Buku Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(\App\Models\Buku::all()->take(3) as $buku)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $buku['judul'] }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $buku['penulis'] }}</h6>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $buku['penerbit'] }} ({{ $buku['tahun_terbit'] }})</small>
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="/buku/{{ $buku['id'] }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Petugas Section -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Petugas Aktif</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach(\App\Models\Petugas::all()->take(4) as $petugas)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">{{ $petugas['nama'] }}</h6>
                                <small class="text-muted">{{ $petugas['email'] }}</small>
                            </div>
                            <a href="/petugas/{{ $petugas['id'] }}" class="btn btn-sm btn-outline-info">Profil</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer bg-white">
                    <a href="/petugas" class="btn btn-sm btn-outline-secondary">Lihat Semua Petugas</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex">
                        <a href="/buku/create" class="btn btn-primary me-md-2">
                            <i class="fas fa-plus me-2"></i>Tambah Buku
                        </a>
                        <a href="/peminjaman/create" class="btn btn-success me-md-2">
                            <i class="fas fa-clipboard-check me-2"></i>Peminjaman Baru
                        </a>
                        <a href="/siswa/create" class="btn btn-warning me-md-2">
                            <i class="fas fa-user-plus me-2"></i>Tambah Siswa
                        </a>
                        <a href="/petugas/create" class="btn btn-info me-md-2">
                            <i class="fas fa-user-shield me-2"></i>Tambah Petugas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection