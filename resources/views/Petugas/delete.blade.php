@extends('layouts.app')

@section('title', 'Hapus Petugas')

@section('content')
    <h2>Hapus Petugas</h2>
    <p>Apakah kamu yakin ingin menghapus data petugas ini?</p>

    <ul>
        <li><strong>Nama:</strong> {{ $petugas->nama }}</li>
        <li><strong>Username:</strong> {{ $petugas->username }}</li>
    </ul>

    <form method="POST" action="{{ route('petugas.destroy', $petugas->id_petugas) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('petugas.index') }}">Batal</a>
    </form>
@endsection
