@extends('layouts.app')
@section('content')
<h2 class="mb-4">Edit Data Petugas</h2>
<form>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" value="{{ $petugas['nama'] }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" value="{{ $petugas['username'] }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ $petugas['email'] }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" value="{{ $petugas['password'] }}">
    </div>
    <button class="btn btn-primary" disabled>Simpan (dummy)</button>
</form>
<a href="/petugas/{{ $petugas['id'] }}" class="btn btn-secondary mt-3">← Kembali ke detail</a>
@endsection
