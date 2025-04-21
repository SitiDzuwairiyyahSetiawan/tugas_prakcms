@extends('layouts.main')
@section('content')
<h2 class="mb-4">Konfirmasi Hapus Petugas</h2>
<div class="alert alert-warning">
    <p>Yakin ingin menghapus <strong>{{ $petugas['nama'] }}</strong>?</p>
</div>
<button class="btn btn-danger" disabled>Ya, Hapus (dummy)</button>
<a href="/petugas/{{ $petugas['id'] }}" class="btn btn-secondary">Batal</a>
@endsection
