@extends('layouts.app')

@section('title', 'Daftar Petugas')

@section('content')
    <h2>Daftar Petugas</h2>

    <a href="{{ route('petugas.create') }}">+ Tambah Petugas</a>
    <br><br>

    <ul>
        @forelse($petugas as $p)
            <li>
            <a href="{{ route('petugas.show', $petugas->id_petugas) }}">
            {{ $p->nama }} ({{ $p->username }})
                </a>
            </li>
        @empty
            <p>Tidak ada data petugas.</p>
        @endforelse
    </ul>
@endsection
