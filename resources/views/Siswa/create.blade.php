@extends('layouts.app')
@section('content')
<h2>Tambah Siswa Baru</h2>
<form>
    <label>NISN: <input type="text"></label><br>
    <label>Nama: <input type="text"></label><br>
    <label>Kelas: <input type="text"></label><br>
    <label>Alamat: <input type="text"></label><br>
    <label>No. Telepon: <input type="text"></label><br>
    <label>Email: <input type="email"></label><br>
    <button disabled>Tambah (dummy)</button>
</form>
<a href="/siswa">← Kembali ke daftar</a>
@endsection
