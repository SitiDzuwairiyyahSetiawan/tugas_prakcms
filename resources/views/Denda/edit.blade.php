@extends('layouts.app')

@section('content')
<h2>Edit Denda</h2>
<form>
    <label>ID Peminjaman: <input type="text" value="{{ $denda['id_peminjaman'] }}"></label><br>
    <label>Jumlah Denda/Hari: <input type="number" value="{{ $denda['jumlah_denda_perhari'] }}"></label><br>
    <label>Total Denda: <input type="number" value="{{ $denda['total_denda'] }}"></label><br>
    <label>Status Pembayaran: <input type="text" value="{{ $denda['status_pembayaran'] }}"></label><br>
    <label>Tanggal Pembayaran: <input type="date" value="{{ $denda['tanggal_pembayaran'] }}"></label><br>
    <button disabled>Simpan (dummy)</button>
</form>
<a href="/denda/{{ $denda['id'] }}">← Kembali</a>
@endsection
