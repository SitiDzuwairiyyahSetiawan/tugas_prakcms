@extends('layouts.app')

@section('title', 'Detail Denda')

@section('content')
<div class="container">
    <h2>Detail Denda</h2>

    <div class="card">
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
                <span class="detail-label">Jumlah Denda Per Hari:</span>
                <div class="detail-value">{{ number_format($denda->jumlah_denda_perhari) }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Total Denda:</span>
                <div class="detail-value">{{ number_format($denda->total_denda) }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Status Pembayaran:</span>
                <div class="detail-value">
                    <span class="badge 
                        @if($denda->status_pembayaran == 'Sudah Dibayar') bg-success
                        @else bg-danger
                        @endif">
                        {{ $denda->status_pembayaran }}
                    </span>
                </div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Tanggal Pembayaran:</span>
                <div class="detail-value">{{ $denda->tanggal_pembayaran ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('denda.edit', $denda->id_denda) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        
        <form action="{{ route('denda.destroy', $denda->id_denda) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus denda ini?')">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        
        <a href="{{ route('denda.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection