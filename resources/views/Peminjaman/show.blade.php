@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<h2>Detail Peminjaman</h2>

<div style="margin-bottom: 20px;">
    <p style="margin-bottom: 8px;"><strong>ID Peminjaman:</strong> {{ $peminjaman->id_peminjaman }}</p>
    <p style="margin-bottom: 8px;"><strong>Buku:</strong> {{ $peminjaman->buku->judul_buku }}</p>
    <p style="margin-bottom: 8px;"><strong>Siswa:</strong> {{ $peminjaman->siswa->nama }}</p>
    <p style="margin-bottom: 8px;"><strong>Petugas:</strong> {{ $peminjaman->petugas->nama }}</p>
    <p style="margin-bottom: 8px;"><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</p>
    <p style="margin-bottom: 8px;"><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</p>
    <p style="margin-bottom: 8px;"><strong>Status:</strong> {{ $peminjaman->status_peminjaman }}</p>
</div>

<div>
    <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}" style="padding: 8px 15px; background-color: #38c172; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit</a>
    
    <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Yakin hapus peminjaman ini?')">Hapus</button>
    </form>
    
    <a href="{{ route('peminjaman.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">← Kembali ke daftar</a>
</div>
@endsection