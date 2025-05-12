@extends('layouts.app')

@section('title', 'Hapus Peminjaman')

@section('content')
<h2>Konfirmasi Hapus Peminjaman</h2>

<p style="margin-bottom: 20px;">Apakah kamu yakin ingin menghapus peminjaman berikut ini?</p>

<ul style="list-style-type: none; padding-left: 0; margin-bottom: 20px;">
    <li style="margin-bottom: 8px;"><strong>ID Peminjaman:</strong> {{ $peminjaman->id_peminjaman }}</li>
    <li style="margin-bottom: 8px;"><strong>Buku:</strong> {{ $peminjaman->buku->judul_buku }}</li>
    <li style="margin-bottom: 8px;"><strong>Siswa:</strong> {{ $peminjaman->siswa->nama }}</li>
    <li style="margin-bottom: 8px;"><strong>Petugas:</strong> {{ $peminjaman->petugas->nama }}</li>
    <li style="margin-bottom: 8px;"><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</li>
    <li style="margin-bottom: 8px;"><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</li>
    <li style="margin-bottom: 8px;"><strong>Status:</strong> {{ $peminjaman->status_peminjaman }}</li>
</ul>

<form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Ya, Hapus</button>
    <a href="{{ route('peminjaman.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
</form>
@endsection