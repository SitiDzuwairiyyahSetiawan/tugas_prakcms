@extends('layouts.app')

@section('title', 'Detail Petugas')

@section('content')
    <h2>Detail Petugas</h2>

    <p><strong>Nama:</strong> {{ $petugas->nama }}</p>
    <p><strong>Username:</strong> {{ $petugas->username }}</p>
    <p><strong>Password:</strong> {{ $petugas->password }}</p>
    <p><strong>Email:</strong> {{ $petugas->email }}</p>

    <a href="{{ route('petugas.edit', $petugas->id_petugas) }}">✏ Edit</a> |
    <a href="{{ route('petugas.delete', $petugas->id_petugas) }}">🗑 Hapus</a> |
    <a href="{{ route('petugas.index') }}">← Kembali</a>
@endsection
