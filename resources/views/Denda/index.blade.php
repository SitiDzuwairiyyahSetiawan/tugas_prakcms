@extends('layouts.app')

@section('title', 'Daftar Denda')

@section('content')
    <h2>Daftar Denda</h2>

    <a href="{{ route('denda.create') }}">+ Tambah Denda</a>
    <br><br>

    <ul>
        @forelse($denda as $item)
            <li>
                <a href="{{ route('denda.show', $item->id_denda) }}">
                    Peminjaman: 
                    {{ $item->peminjaman->buku->judul_buku }} - 
                    {{ $item->peminjaman->siswa->nama }}
                    | Status Pembayaran: {{ $item->status_pembayaran }}
                </a>
            </li>
        @empty
            <p>Tidak ada data denda.</p>
        @endforelse
    </ul>
@endsection
