@extends('layouts.app')

@section('title', 'Hapus Petugas')

@section('content')
<h2>Konfirmasi Hapus Petugas</h2>

<p style="margin-bottom: 20px;">Apakah kamu yakin ingin menghapus petugas berikut ini?</p>

<ul style="list-style-type: none; padding-left: 0; margin-bottom: 20px;">
    <li style="margin-bottom: 8px;"><strong>ID Petugas:</strong> {{ $petugas->id_petugas }}</li>
    <li style="margin-bottom: 8px;"><strong>Nama:</strong> {{ $petugas->nama }}</li>
    <li style="margin-bottom: 8px;"><strong>Username:</strong> {{ $petugas->username }}</li>
    <li style="margin-bottom: 8px;"><strong>Email:</strong> {{ $petugas->email }}</li>
</ul>

<form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Ya, Hapus</button>
    <a href="{{ route('petugas.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
</form>
@endsection