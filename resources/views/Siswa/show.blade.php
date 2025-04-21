@extends('layouts.main')
@section('content')
<h2>Detail Siswa</h2>
    <p><strong>NISN:</strong> {{ $siswa['nisn'] }}</p>
    <p><strong>Nama:</strong> {{ $siswa['nama'] }}</p>
    <p><strong>Kelas:</strong> {{ $siswa['kelas'] }}</p>
    <p><strong>Alamat:</strong> {{ $siswa['alamat'] }}</p>
    <p><strong>No. Telepon:</strong> {{ $siswa['nomor_telepon'] }}</p>
    <p><strong>Email:</strong> {{ $siswa['email'] }}</p>
<a href="/siswa/{{ $siswa['id'] }}/edit">Edit</a> |
<a href="/siswa/{{ $siswa['id'] }}/delete">Hapus</a> |
<a href="/siswa">Kembali</a>
@endsection
