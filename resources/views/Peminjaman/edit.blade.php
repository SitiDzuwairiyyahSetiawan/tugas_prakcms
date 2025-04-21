@extends('layouts.app')

@section('content')
<h2>Edit Peminjaman</h2>
<form>
    <label>Status: <input type="text" value="{{ $peminjaman['status_peminjaman'] }}"></label><br>
    <button disabled>Simpan (dummy)</button>
</form>
<a href="/peminjaman/{{ $peminjaman['id'] }}">← Kembali</a>
@endsection
