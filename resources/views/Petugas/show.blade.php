@extends('layouts.app')

@section('title', 'Detail Petugas')

@section('content')
<div class="container">
    <h2>Detail Petugas</h2>

    <div class="card">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">ID Petugas:</span>
                <div class="detail-value">{{ $petugas->id_petugas }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Nama:</span>
                <div class="detail-value">{{ $petugas->nama }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Username:</span>
                <div class="detail-value">{{ $petugas->username }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <div class="detail-value">{{ $petugas->email }}</div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('petugas.edit', $petugas->id_petugas) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        
        <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus petugas ini?')">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection