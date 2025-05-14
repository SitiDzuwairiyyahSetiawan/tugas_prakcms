@extends('layouts.app')

@section('title', 'Hapus Buku')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Buku</h2>

    <div class="confirmation-message">
        Apakah kamu yakin ingin menghapus buku berikut ini?
    </div>

    <div class="card confirmation-details">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">ID Buku:</span>
                <div class="detail-value">{{ $buku->id_buku }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Judul:</span>
                <div class="detail-value">{{ $buku->judul_buku }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Penulis:</span>
                <div class="detail-value">{{ $buku->penulis }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Penerbit:</span>
                <div class="detail-value">{{ $buku->penerbit }}</div>
            </div>
        </div>
    </div>

    <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Ya, Hapus
        </button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
        </a>
    </form>
</div>
@endsection