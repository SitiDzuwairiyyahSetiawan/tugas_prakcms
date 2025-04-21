@extends('layouts.app')

@section('content')
<h2>Tambah Denda Baru</h2>
<form>
    <label>ID Peminjaman: <input type="text"></label><br>
    <label>Jumlah Denda/Hari: <input type="number"></label><br>
    <label>Total Denda: <input type="number"></label><br>
    <label>Status Pembayaran: <input type="text"></label><br>
    <label>Tanggal Pembayaran: <input type="date"></label><br>
    <button disabled>Tambah (dummy)</button>
</form>
<a href="/denda">← Kembali</a>
@endsection
