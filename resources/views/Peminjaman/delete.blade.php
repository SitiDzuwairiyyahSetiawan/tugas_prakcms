@extends('layouts.app')

@section('title', 'Hapus Peminjaman')

@section('content')
    <h2>Hapus Peminjaman</h2>
    <p>Apakah kamu yakin ingin menghapus data peminjaman ini?</p>

    <!-- Menampilkan informasi peminjaman yang akan dihapus -->
    <ul>
        <li><strong>Buku:</strong> {{ $peminjaman->buku->judul_buku }}</li>
        <li><strong>Siswa:</strong> {{ $peminjaman->siswa->nama }}</li>
        <li><strong>Petugas:</strong> {{ $peminjaman->petugas->nama }}</li>
        <li><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</li>
        <li><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</li>
        <li><strong>Status Peminjaman:</strong> {{ $peminjaman->status_peminjaman }}</li>
    </ul>

    <!-- Form untuk menghapus peminjaman -->
    <form method="POST" action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}">
        @csrf
        @method('DELETE')

        <!-- Konfirmasi penghapusan -->
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
