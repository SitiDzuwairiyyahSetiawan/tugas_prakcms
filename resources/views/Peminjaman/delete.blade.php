@extends('layouts.main')
@section('content')
<h2>Hapus Peminjaman</h2>
<p>Yakin ingin menghapus peminjaman #{{ $peminjaman['id'] }}?</p>
<button disabled>Ya, Hapus</button>
<a href="/peminjaman/{{ $peminjaman['id'] }}">Batal</a>
@endsection
