@extends('layouts.app')

@section('title', 'Hapus Petugas')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Petugas</h2>

    <div class="confirmation-message">
        Apakah kamu yakin ingin menghapus petugas berikut ini?
    </div>

    <div class="card confirmation-details">
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

    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Ya, Hapus
        </button>
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
        </a>
    </form>
</div>
@endsection