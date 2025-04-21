@extends('layouts.main')
@section('content')
<h2>Detail Peminjaman</h2>
<p><strong>ID Buku:</strong> {{ $peminjaman['id_buku'] }}</p>
<p><strong>ID Siswa:</strong> {{ $peminjaman['id_siswa'] }}</p>
<p><strong>ID Petugas:</strong> {{ $peminjaman['id_petugas'] }}</p>
<p><strong>Tanggal Pinjam:</strong> {{ $peminjaman['tanggal_peminjaman'] }}</p>
<p><strong>Tanggal Kembali:</strong> {{ $peminjaman['tanggal_pengembalian'] }}</p>
<p><strong>Status:</strong> {{ $peminjaman['status_peminjaman'] }}</p>
<a href="/peminjaman/{{ $peminjaman['id'] }}/edit">Edit</a> |
<a href="/peminjaman/{{ $peminjaman['id'] }}/delete">Hapus</a> |
<a href="/peminjaman">Kembali</a>
@endsection
