@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Judul Buku:</label>
            <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Penulis:</label>
            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Penerbit:</label>
            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                   min="1000" max="9999" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn', $buku->isbn) }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Kategori Buku:</label>
            <input type="text" name="kategori_buku" value="{{ old('kategori_buku', $buku->kategori_buku) }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Buku Tersedia:</label>
            <input type="number" name="jumlah_buku_tersedia" value="{{ old('jumlah_buku_tersedia', $buku->jumlah_buku_tersedia) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection