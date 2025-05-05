@extends('layouts.app')

@section('title', 'Hapus Siswa')

@section('content')
    <h2>Hapus Siswa</h2>
    <p>Apakah kamu yakin ingin menghapus data siswa ini?</p>

    <ul>
        <li><strong>Nama:</strong> {{ $siswa->nama }}</li>
        <li><strong>NISN:</strong> {{ $siswa->nisn }}</li>
    </ul>

    <form method="POST" action="{{ route('siswa.destroy', $siswa->id_siswa) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>

        <a href="{{ route('siswa.index') }}">Batal</a>
    </form>
@endsection
