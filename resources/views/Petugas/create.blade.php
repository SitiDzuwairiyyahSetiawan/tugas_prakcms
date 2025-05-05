@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
    <h2>Tambah Petugas Baru</h2>

    <form method="POST" action="{{ route('petugas.store') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Tambah</button>
    </form>

    <a href="{{ route('petugas.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
