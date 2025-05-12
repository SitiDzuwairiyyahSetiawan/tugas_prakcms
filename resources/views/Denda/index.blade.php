@extends('layouts.app')

@section('title', 'Daftar Denda')

@section('content')
    <h2>Daftar Denda</h2>

    <a href="{{ route('denda.create') }}">+ Tambah Denda</a>
    <br><br>

    <ul>
        @forelse($dendas as $denda)
            <li>
            <a href="{{ route('denda.show', $denda->id_denda) }}">
                Peminjaman: 
                {{ optional($denda->peminjaman?->buku)->judul_buku ?? 'Buku tidak ditemukan' }} - 
                {{ optional($denda->peminjaman?->siswa)->nama ?? 'Siswa tidak ditemukan' }} |
                Status Pembayaran: {{ $denda->status_pembayaran }}
            </a>
            </li>
        @empty
            <p>Tidak ada data denda.</p>
        @endforelse
    </ul>
@endsection
