@extends('layouts.main')
@section('content')
<h2>Tambah Peminjaman</h2>
<form>
    <label>ID Buku: <input type="text"></label><br>
    <label>ID Siswa: <input type="text"></label><br>
    <label>ID Petugas: <input type="text"></label><br>
    <label>Tanggal Pinjam: <input type="text"></label><br>
    <label>Tanggal Kembali: <input type="text"></label><br>
    <label>Status: <input type="text"></label><br>
    <button disabled>Tambah (dummy)</button>
</form>
<a href="/peminjaman">← Kembali ke daftar</a>
@endsection
