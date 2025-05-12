@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h2>Edit Buku</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
        <ul style="list-style-type: none; padding-left: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" style="max-width: 500px;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Judul Buku:</label>
        <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Penulis:</label>
        <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Penerbit:</label>
        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" min="1000" max="9999" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">ISBN:</label>
        <input type="text" name="isbn" value="{{ old('isbn', $buku->isbn) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Kategori Buku:</label>
        <input type="text" name="kategori_buku" value="{{ old('kategori_buku', $buku->kategori_buku) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Jumlah Buku Tersedia:</label>
        <input type="number" name="jumlah_buku_tersedia" value="{{ old('jumlah_buku_tersedia', $buku->jumlah_buku_tersedia) }}" style="width: 100%; padding: 8px;">
    </div>

    <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Update</button>
</form>

<a href="{{ route('buku.index') }}" style="display: inline-block; margin-top: 20px; color: #3490dc; text-decoration: none;">← Kembali</a>
@endsection