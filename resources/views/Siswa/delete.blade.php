@extends('layouts.app')

@section('title', 'Hapus Siswa')

@section('content')
<h2>Konfirmasi Hapus Siswa</h2>

<p style="margin-bottom: 20px;">Apakah kamu yakin ingin menghapus siswa berikut ini?</p>

<ul style="list-style-type: none; padding-left: 0; margin-bottom: 20px;">
    <li style="margin-bottom: 8px;"><strong>ID Siswa:</strong> {{ $siswa->id_siswa }}</li>
    <li style="margin-bottom: 8px;"><strong>NISN:</strong> {{ $siswa->nisn }}</li>
    <li style="margin-bottom: 8px;"><strong>Nama:</strong> {{ $siswa->nama }}</li>
    <li style="margin-bottom: 8px;"><strong>Kelas:</strong> {{ $siswa->kelas }}</li>
    <li style="margin-bottom: 8px;"><strong>Email:</strong> {{ $siswa->email }}</li>
</ul>

<form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Ya, Hapus</button>
    <a href="{{ route('siswa.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
</form>
@endsection