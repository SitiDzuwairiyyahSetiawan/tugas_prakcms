@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h2>Tambah Buku Baru</h2>

    <form style="line-height: 2;">
        <label>Judul: <input type="text"></label><br>
        <label>Penulis: <input type="text"></label><br>
        <label>Penerbit: <input type="text"></label><br>
        <label>Tahun Terbit: <input type="number"></label><br>
        <label>ISBN: <input type="text"></label><br>
        <label>Kategori: <input type="text"></label><br>
        <label>Jumlah Stok: <input type="number"></label><br>
        <button disabled class="btn btn-success mt-2">Tambah (dummy)</button>
    </form>

    <a href="/buku" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection
