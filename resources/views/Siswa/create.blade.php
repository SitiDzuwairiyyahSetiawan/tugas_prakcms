@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
    <h2>Tambah Siswa Baru</h2>

    <form method="POST" action="{{ route('siswa.store') }}">
        @csrf
        <label>NISN:</label><br>
        <input type="text" name="nisn" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Tambah</button>
    </form>

    <a href="{{ route('siswa.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
