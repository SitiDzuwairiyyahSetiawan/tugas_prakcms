@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>

    <div style="line-height: 2;">
        <p><strong>Judul:</strong> {{ $buku['judul'] }}</p>
        <p><strong>Penulis:</strong> {{ $buku['penulis'] }}</p>
        <p><strong>Penerbit:</strong> {{ $buku['penerbit'] }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $buku['tahun_terbit'] }}</p>
        <p><strong>ISBN:</strong> {{ $buku['isbn'] }}</p>
        <p><strong>Kategori:</strong> {{ $buku['kategori_buku'] }}</p>
        <p><strong>Jumlah Stok:</strong> {{ $buku['jumlah_stok'] }}</p>
    </div>

    <a href="/buku/{{ $buku['id'] }}/edit" class="btn btn-warning me-2">✏️ Edit</a>
    <a href="/buku/{{ $buku['id'] }}/delete" class="btn btn-danger me-2">🗑️ Hapus</a>
    <a href="/buku" class="btn btn-secondary">← Kembali ke daftar</a>
@endsection
