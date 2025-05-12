@extends('layouts.app')

@section('title', 'Detail Denda')

@section('content')
    <h2>Detail Denda</h2>

    <p><strong>Peminjaman Buku:</strong> {{ $denda->peminjaman->buku->judul_buku }}</p>
    <p><strong>Peminjam Siswa:</strong> {{ $denda->peminjaman->siswa->nama }}</p>
    <p><strong>Jumlah Denda Per Hari:</strong> {{ $denda->jumlah_denda_perhari }}</p>
    <p><strong>Total Denda:</strong> {{ $denda->total_denda }}</p>
    <p><strong>Status Pembayaran:</strong> {{ $denda->status_pembayaran }}</p>
    <p><strong>Tanggal Pembayaran:</strong> {{ $denda->tanggal_pembayaran }}</p>

    <a href="{{ route('denda.edit', $denda->id_denda) }}">✏ Edit</a> |
    <form action="{{ route('denda.destroy', $denda->id_denda) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">🗑 Hapus</button>
    </form>

    <br><a href="{{ route('denda.index') }}">← Kembali ke daftar</a>
@endsection
