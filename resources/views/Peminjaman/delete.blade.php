@extends('layouts.app')

@section('title', 'Hapus Peminjaman')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Peminjaman</h2>

    <div class="confirmation-message">
        Apakah kamu yakin ingin menghapus peminjaman berikut ini?
    </div>

    <div class="card confirmation-details">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">ID Peminjaman:</span>
                <div class="detail-value">{{ $peminjaman->id_peminjaman }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Buku:</span>
                <div class="detail-value">{{ $peminjaman->buku->judul_buku }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Siswa:</span>
                <div class="detail-value">{{ $peminjaman->siswa->nama }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Status:</span>
                <div class="detail-value">{{ $peminjaman->status_peminjaman }}</div>
            </div>
        </div>
    </div>

    <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Ya, Hapus
        </button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
        </a>
    </form>
</div>
@endsection