@extends('layouts.app')

@section('title', 'Hapus Buku')

@section('content')
<h2>Konfirmasi Hapus Buku</h2>

<p style="margin-bottom: 20px;">Apakah kamu yakin ingin menghapus buku berikut ini?</p>

<ul style="list-style-type: none; padding-left: 0; margin-bottom: 20px;">
    <li style="margin-bottom: 8px;"><strong>ID Buku:</strong> {{ $buku->id_buku }}</li>
    <li style="margin-bottom: 8px;"><strong>Judul:</strong> {{ $buku->judul_buku }}</li>
    <li style="margin-bottom: 8px;"><strong>Penulis:</strong> {{ $buku->penulis }}</li>
    <li style="margin-bottom: 8px;"><strong>Penerbit:</strong> {{ $buku->penerbit }}</li>
    <li style="margin-bottom: 8px;"><strong>Tahun Terbit:</strong> {{ \Carbon\Carbon::parse($buku->tahun_terbit)->format('Y') }}</li>
    <li style="margin-bottom: 8px;"><strong>Kategori:</strong> {{ $buku->kategori_buku }}</li>
</ul>

<form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Ya, Hapus</button>
    <a href="{{ route('buku.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
</form>
@endsection