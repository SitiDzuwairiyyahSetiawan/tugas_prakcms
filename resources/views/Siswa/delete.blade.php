@extends('layouts.app')

@section('title', 'Hapus Siswa')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Siswa</h2>

    <div class="confirmation-message">
        Apakah kamu yakin ingin menghapus siswa berikut ini?
    </div>

    <div class="card confirmation-details">
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
        </div>
    </div>

    <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Ya, Hapus
        </button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
        </a>
    </form>
</div>
@endsection