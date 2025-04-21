@extends('layouts.main')
@section('content')
<h2 class="mb-4">Detail Petugas</h2>
<div class="mb-3">
    <p><strong>Nama:</strong> {{ $petugas['nama'] }}</p>
    <p><strong>Username:</strong> {{ $petugas['username'] }}</p>
    <p><strong>Email:</strong> {{ $petugas['email'] }}</p>
    <p><strong>Password:</strong> {{ $petugas['password'] }}</p>
</div>
<a href="/petugas/{{ $petugas['id'] }}/edit" class="btn btn-warning">✏️ Edit</a>
<a href="/petugas/{{ $petugas['id'] }}/delete" class="btn btn-danger">🗑️ Hapus</a>
<a href="/petugas" class="btn btn-secondary">← Kembali</a>
@endsection
