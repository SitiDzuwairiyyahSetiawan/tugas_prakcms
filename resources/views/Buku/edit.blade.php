@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Buku</h2>

    <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}">
        @csrf
        @method('PUT')

        <label>Judul Buku:</label><br>
        <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}"><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="{{ $buku->penulis }}"><br><br>

        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" value="{{ $buku->penerbit }}"><br><br>

        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}"><br><br>

        <label>ISBN:</label><br>
        <input type="text" name="isbn" value="{{ $buku->isbn }}"><br><br>

        <label>Kategori Buku:</label><br>
        <input type="text" name="kategori_buku" value="{{ $buku->kategori_buku }}"><br><br>

        <label>Jumlah Buku Tersedia:</label><br>
        <input type="number" name="jumlah_buku_tersedia" value="{{ $buku->jumlah_buku_tersedia }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('buku.index') }}" style="display:inline-block; margin-top:20px;">← Kembali</a>
@endsection
