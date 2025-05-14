@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>

    <div class="card">
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
                <span class="detail-label">Petugas:</span>
                <div class="detail-value">{{ $peminjaman->petugas->nama }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Tanggal Peminjaman:</span>
                <div class="detail-value">{{ $peminjaman->tanggal_peminjaman }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Tanggal Pengembalian:</span>
                <div class="detail-value">{{ $peminjaman->tanggal_pengembalian }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Status:</span>
                <div class="detail-value">
                    <span class="badge 
                        @if($peminjaman->status_peminjaman == 'Dipinjam') bg-primary
                        @elseif($peminjaman->status_peminjaman == 'Dikembalikan') bg-success
                        @else bg-danger
                        @endif">
                        {{ $peminjaman->status_peminjaman }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        
        <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus peminjaman ini?')">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection