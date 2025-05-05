@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
    <h2>Detail Peminjaman</h2>

    <p><strong>ID Buku:</strong> {{ $peminjaman->id_buku }}</p>
    <p><strong>ID Siswa:</strong> {{ $peminjaman->id_siswa }}</p>
    <p><strong>ID Petugas:</strong> {{ $peminjaman->id_petugas }}</p>
    <p><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</p>
    <p><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</p>
    <p><strong>Status:</strong> {{ $peminjaman->status_peminjaman }}</p>

    <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}">✏ Edit</a> |
    <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">🗑 Hapus</button>
    </form>

    <br><a href="{{ route('peminjaman.index') }}">← Kembali ke daftar</a>
@endsection
