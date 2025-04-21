@extends('layouts.main')
@section('content')
<h2>Edit Siswa</h2>
<form>
    <label>Nama: <input type="text" value="{{ $siswa['nama'] }}"></label><br>
    <label>Kelas: <input type="text" value="{{ $siswa['kelas'] }}"></label><br>
    <label>Alamat: <input type="text" value="{{ $siswa['alamat'] }}"></label><br>
    <label>No. Telepon: <input type="text" value="{{ $siswa['nomor_telepon'] }}"></label><br>
    <label>Email: <input type="email" value="{{ $siswa['email'] }}"></label><br>
    <button disabled>Simpan (dummy)</button>
</form>
<a href="/siswa/{{ $siswa['id'] }}">← Kembali</a>
@endsection
