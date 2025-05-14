@extends('layouts.app')

@section('title', 'Hapus Denda')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Denda</h2>

    <div class="confirmation-message">
        Apakah kamu yakin ingin menghapus denda berikut ini?
    </div>

    <div class="card confirmation-details">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">ID Denda:</span>
                <div class="detail-value">{{ $denda->id_denda }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Peminjaman:</span>
                <div class="detail-value">
                    {{ $denda->peminjaman->buku->judul_buku }} - {{ $denda->peminjaman->siswa->nama }}
                </div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Total Denda:</span>
                <div class="detail-value">{{ number_format($denda->total_denda) }}</div>
            </div>
            <div class="detail-item">
                <span class="detail-label">Status:</span>
                <div class="detail-value">{{ $denda->status_pembayaran }}</div>
            </div>
        </div>
    </div>

    <form action="{{ route('denda.destroy', $denda->id_denda) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Ya, Hapus
        </button>
        <a href="{{ route('denda.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
        </a>
    </form>
</div>
@endsection