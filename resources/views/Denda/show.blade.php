@extends('layouts.app')

@section('content')
<h2>Detail Denda</h2>
<ul>
    <li>ID: {{ $denda['id'] }}</li>
    <li>ID Peminjaman: {{ $denda['id_peminjaman'] }}</li>
    <li>Jumlah Denda/Hari: {{ $denda['jumlah_denda_perhari'] }}</li>
    <li>Total Denda: {{ $denda['total_denda'] }}</li>
    <li>Status Pembayaran: {{ $denda['status_pembayaran'] }}</li>
    <li>Tanggal Pembayaran: {{ $denda['tanggal_pembayaran'] }}</li>
</ul>
<a href="/denda/{{ $denda['id'] }}/edit">✏️ Edit</a>
<a href="/denda/{{ $denda['id'] }}/delete">🗑️ Hapus</a>
<a href="/denda">← Kembali</a>
@endsection
