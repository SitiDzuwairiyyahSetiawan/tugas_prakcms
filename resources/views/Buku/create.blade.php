@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h2>Tambah Buku Baru</h2>

    <form method="POST" action="{{ route('siswa.store') }}">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="judul_buku" required><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" required><br><br>

        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" required><br><br>

        <label>Tahun Terbit:</label><br>
        <input type="text" name="tahun_terbit" required><br><br>

        <label>ISBN:</label><br>
        <input type="text" name="isbn" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" required><br><br>

        <label>Jumlah Buku Tersedia:</label><br>
        <input type="text" name="jumlah_buku_tersedia" required><br><br>

        <button type="submit">Simpan</button>
    </form>


    <a href="{{ route('buku.index') }}" style="display:inline-block; margin-top:20px;">← Kembali ke daftar buku</a>
@endsection
