@extends('layouts.app')

@section('content')
<h2>Hapus Denda</h2>
<p>Yakin ingin menghapus peminjaman ID {{ $peminjaman['id'] }}?</p>
<button disabled>Ya, Hapus (dummy)</button>
<a href="/peminjaman/{{ $peminjaman['id'] }}">Batal</a>
@endsection
