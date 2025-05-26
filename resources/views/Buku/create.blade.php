@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container">
    <h2>Tambah Buku Baru</h2>

    {{-- Menampilkan semua error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Buku tidak berhasil ditambahkan, data tidak valid:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('buku.store') }}" class="form-container">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Judul:</label>
            <input type="text" name="judul_buku" value="{{ old('judul_buku') }}" class="form-control" required>
            @error('judul_buku')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis') }}" class="form-control" required>
            @error('penulis')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Penerbit:</label>
            <input type="text" name="penerbit" value="{{ old('penerbit') }}" class="form-control" required>
            @error('penerbit')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}" class="form-control" required>
            @error('tahun_terbit')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control" required>
            @error('isbn')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Kategori:</label>
            <input type="text" name="kategori_buku" value="{{ old('kategori_buku') }}" class="form-control" required>
            @error('kategori_buku')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Buku Tersedia:</label>
            <input type="text" name="jumlah_buku_tersedia" value="{{ old('jumlah_buku_tersedia') }}" class="form-control" required>
            @error('jumlah_buku_tersedia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
