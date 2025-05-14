@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>

    <div class="card">
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
            
            <div class="detail-item">
                <span class="detail-label">Tahun Terbit:</span>
                <div class="detail-value">{{ \Carbon\Carbon::parse($buku->tahun_terbit)->format('Y-m-d') }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">ISBN:</span>
                <div class="detail-value">{{ $buku->isbn }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Kategori:</span>
                <div class="detail-value">{{ $buku->kategori_buku }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Jumlah Tersedia:</span>
                <div class="detail-value">{{ $buku->jumlah_buku_tersedia }}</div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('buku.edit', $buku->id_buku) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        
        <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus buku ini?')">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection