@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="container">
    <h2>Detail Siswa</h2>

    <div class="card">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">ID Siswa:</span>
                <div class="detail-value">{{ $siswa->id_siswa }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">NISN:</span>
                <div class="detail-value">{{ $siswa->nisn }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Nama:</span>
                <div class="detail-value">{{ $siswa->nama }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Kelas:</span>
                <div class="detail-value">{{ $siswa->kelas }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Alamat:</span>
                <div class="detail-value">{{ $siswa->alamat }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Nomor Telepon:</span>
                <div class="detail-value">{{ $siswa->nomor_telepon }}</div>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <div class="detail-value">{{ $siswa->email }}</div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('siswa.edit', $siswa->id_siswa) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        
        <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus siswa ini?')">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection