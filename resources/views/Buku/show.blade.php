@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<h2>Detail Buku</h2>

<div style="margin-bottom: 20px;">
    <p style="margin-bottom: 8px;"><strong>ID Buku:</strong> {{ $buku->id_buku }}</p>
    <p style="margin-bottom: 8px;"><strong>Judul:</strong> {{ $buku->judul_buku }}</p>
    <p style="margin-bottom: 8px;"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
    <p style="margin-bottom: 8px;"><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
    <p style="margin-bottom: 8px;"><strong>Tahun Terbit:</strong> {{ \Carbon\Carbon::parse($buku->tahun_terbit)->format('Y-m-d') }}</p>
    <p style="margin-bottom: 8px;"><strong>ISBN:</strong> {{ $buku->isbn }}</p>
    <p style="margin-bottom: 8px;"><strong>Kategori:</strong> {{ $buku->kategori_buku }}</p>
    <p style="margin-bottom: 8px;"><strong>Jumlah Buku Tersedia:</strong> {{ $buku->jumlah_buku_tersedia }}</p>
</div>

<div>
    <a href="{{ route('buku.edit', $buku->id_buku) }}" style="padding: 8px 15px; background-color: #38c172; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit</a>
    
    <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Yakin hapus buku ini?')">Hapus</button>
    </form>
    
    <a href="{{ route('buku.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">← Kembali ke daftar</a>
</div>
@endsection