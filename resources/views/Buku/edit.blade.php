@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Data Buku</h2>

    <form style="line-height: 2;">
        <label>Judul: <input type="text" value="{{ $buku['judul'] }}"></label><br>
        <label>Penulis: <input type="text" value="{{ $buku['penulis'] }}"></label><br>
        <label>Penerbit: <input type="text" value="{{ $buku['penerbit'] }}"></label><br>
        <label>Tahun Terbit: <input type="number" value="{{ $buku['tahun_terbit'] }}"></label><br>
        <label>ISBN: <input type="text" value="{{ $buku['isbn'] }}"></label><br>
        <label>Kategori: <input type="text" value="{{ $buku['kategori_buku'] }}"></label><br>
        <label>Jumlah Stok: <input type="number" value="{{ $buku['jumlah_stok'] }}"></label><br>
        <button disabled class="btn btn-primary mt-2">Simpan (dummy)</button>
    </form>

    <a href="/buku/{{ $buku['id'] }}" class="btn btn-secondary mt-3">← Kembali ke detail</a>
@endsection
