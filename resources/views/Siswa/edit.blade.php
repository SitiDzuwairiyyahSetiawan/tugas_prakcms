@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
    <h2>Edit Data Siswa</h2>

    <form method="POST" action="{{ route('siswa.update', $siswa->id_siswa) }}">
        @csrf
        @method('PUT')

        <label>NISN:</label><br>
        <input type="text" name="nisn" value="{{ $siswa->nisn }}"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $siswa->nama }}"><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" value="{{ $siswa->kelas }}"><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat">{{ $siswa->alamat }}</textarea><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" value="{{ $siswa->nomor_telepon }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $siswa->email }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('siswa.index') }}" style="display:inline-block; margin-top:20px;">← Kembali</a>
@endsection
