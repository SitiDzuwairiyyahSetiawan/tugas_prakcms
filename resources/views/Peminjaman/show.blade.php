@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
    <h2>Detail Peminjaman</h2>

    <p><strong>Buku:</strong> {{ $peminjaman->buku->judul_buku }}</p>
    <p><strong>Siswa:</strong> {{ $peminjaman->siswa->nama }}</p>
    <p><strong>Petugas:</strong> {{ $peminjaman->petugas->nama }}</p>
    <p><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</p>
    <p><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</p>
    <p><strong>Status Peminjaman:</strong> {{ $peminjaman->status_peminjaman }}</p>

    <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}">✏ Edit</a> |
    <a href="{{ route('peminjaman.delete', $peminjaman->id_peminjaman) }}">🗑 Hapus</a> |
    <a href="{{ route('peminjaman.index') }}">← Kembali</a>
@endsection
