@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <h2>Daftar Siswa</h2>

    <a href="{{ route('siswa.create') }}">+ Tambah Siswa</a>
    <br><br>

    <ul>
        @forelse($siswas as $siswa)
            <li>
            <a href="{{ route('siswa.show', ['siswa' => $siswa->id]) }}">Lihat Detail Siswa</a>
                    {{ $siswa->nama }} ({{ $siswa->nisn }})
                </a>
            </li>
        @empty
            <p>Tidak ada data siswa.</p>
        @endforelse
    </ul>
@endsection
