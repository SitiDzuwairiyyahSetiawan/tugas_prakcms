@extends('layouts.app')

@section('title', 'Hapus Denda')

@section('content')
    <h2>Hapus Denda</h2>
    <p>Apakah kamu yakin ingin menghapus data denda ini?</p>

    <ul>
        <li><strong>Peminjaman:</strong> {{ $denda->peminjaman->buku->judul_buku }} - {{ $denda->peminjaman->siswa->nama }}</li>
        <li><strong>Jumlah Denda:</strong> {{ $denda->total_denda }}</li>
    </ul>

    <form method="POST" action="{{ route('denda.destroy', $denda->id_denda) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('denda.index') }}">Batal</a>
    </form>
@endsection
