@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>

    <p><strong>Judul:</strong> {{ $buku->judul_buku }}</p>
    <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
    <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
    <p><strong>ISBN:</strong> {{ $buku->isbn }}</p>
    <p><strong>Kategori:</strong> {{ $buku->kategori_buku }}</p>
    <p><strong>Jumlah Tersedia:</strong> {{ $buku->jumlah_buku_tersedia }}</p>

    <br>

    <a href="{{ route('buku.edit', $buku->id_buku) }}">✏ Edit</a> |
    <a href="{{ route('buku.delete', $buku->id_buku) }}">🗑 Hapus</a> |
    <a href="{{ route('buku.index') }}">← Kembali</a>
@endsection
