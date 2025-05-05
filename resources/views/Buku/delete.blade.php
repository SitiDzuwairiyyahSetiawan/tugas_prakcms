@extends('layouts.app')

@section('title', 'Hapus Buku')

@section('content')
    <h2>Hapus Buku</h2>
    <p>Apakah Anda yakin ingin menghapus buku ini?</p>

    <ul>
        <li><strong>Judul:</strong> {{ $buku->judul_buku }}</li>
        <li><strong>Penulis:</strong> {{ $buku->penulis }}</li>
    </ul>

    <form method="POST" action="{{ route('buku.destroy', $buku->id_buku) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('buku.index') }}">Batal</a>
    </form>
@endsection
