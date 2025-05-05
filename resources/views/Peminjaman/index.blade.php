@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h2>Daftar Peminjaman</h2>

    <a href="{{ route('peminjaman.create') }}">+ Tambah Peminjaman</a>
    <br><br>

    <!-- Menampilkan daftar peminjaman -->
    <ul>
        @forelse($peminjaman as $item)
            <li>
                <a href="{{ route('peminjaman.show', $item->id_peminjaman) }}">
                    {{ $item->buku->judul_buku }} oleh {{ $item->siswa->nama }} ({{ $item->status_peminjaman }})
                </a>
            </li>
        @empty
            <p>Tidak ada data peminjaman.</p>
        @endforelse
    </ul>
@endsection
