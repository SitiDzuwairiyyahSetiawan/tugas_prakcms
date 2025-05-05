@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')
    <h2>Edit Data Petugas</h2>

    <form method="POST" action="{{ route('petugas.update', $petugas->id_petugas) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $petugas->nama }}"><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ $petugas->username }}"><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="{{ $petugas->password }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $petugas->email }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('petugas.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali</a>
@endsection
