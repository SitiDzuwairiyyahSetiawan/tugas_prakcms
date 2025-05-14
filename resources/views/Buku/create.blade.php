@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container">
    <h2>Tambah Buku Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
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
        </div>

        <div class="form-group">
            <label class="form-label">Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Penerbit:</label>
            <input type="text" name="penerbit" value="{{ old('penerbit') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" min="1000" max="9999" class="form-control" value="{{ old('tahun_terbit') }}">
        </div>

        <div class="form-group">
            <label class="form-label">ISBN:</label>
            <input type="text" name="isbn" maxlength="13" pattern="\d{13}" title="Masukkan 13 digit angka ISBN" 
                   value="{{ old('isbn') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Kategori:</label>
            <input type="text" name="kategori_buku" value="{{ old('kategori_buku') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Buku Tersedia:</label>
            <input type="number" name="jumlah_buku_tersedia" value="{{ old('jumlah_buku_tersedia') }}" class="form-control" required>
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