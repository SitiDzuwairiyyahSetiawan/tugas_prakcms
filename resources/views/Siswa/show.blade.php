@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <h2>Detail Siswa</h2>

    <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
    <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $siswa->nomor_telepon }}</p>
    <p><strong>Email:</strong> {{ $siswa->email }}</p>

    <a href="{{ route('siswa.edit', $siswa->id_siswa) }}">✏ Edit</a> |
    <a href="{{ route('siswa.delete', $siswa->id_siswa) }}">🗑 Hapus</a> |
    <a href="{{ route('siswa.index') }}">← Kembali</a>
@endsection
