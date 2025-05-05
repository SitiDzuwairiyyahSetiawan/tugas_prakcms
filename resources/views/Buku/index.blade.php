@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>
    <a href="{{ route('buku.create') }}">+ Tambah Buku</a>
    <br><br>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @forelse($bukus as $buku)
            <li>
                {{ $buku->judul_buku }} - {{ $buku->penulis }}
                <a href="{{ route('buku.edit', $buku->id) }}">Edit</a> |
                <a href="{{ route('buku.delete', $buku->id) }}" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
            </li>
        @empty
            <li>Tidak ada buku yang tersedia.</li>
        @endforelse
    </ul>
@endsection
