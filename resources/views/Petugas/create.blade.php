@extends('layouts.main')
@section('content')
<h2 class="mb-4">Tambah Petugas Baru</h2>
<form>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control">
    </div>
    <button class="btn btn-success" disabled>Tambah (dummy)</button>
</form>
<a href="/petugas" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection
