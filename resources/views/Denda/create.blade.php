@extends('layouts.app')

@section('title', 'Tambah Denda')

@section('content')
    <h2>Tambah Denda Baru</h2>

    <form method="POST" action="{{ route('denda.store') }}">
        @csrf

        <label for="id_peminjaman">ID Peminjaman</label>
        <input type="text" name="id_peminjaman" required><br><br>

        <label>Jumlah Denda Per Hari:</label><br>
        <input type="number" name="jumlah_denda_perhari" required><br><br>

        <label>Total Denda:</label><br>
        <input type="number" name="total_denda" required><br><br>

        <label>Status Pembayaran:</label><br>
        <select name="status_pembayaran" required>
            <option value="Belum Dibayar">Belum Dibayar</option>
            <option value="Sudah Dibayar">Sudah Dibayar</option>
        </select><br><br>

        <label>Tanggal Pembayaran:</label><br>
        <input type="date" name="tanggal_pembayaran"><br><br>

        <button type="submit">Tambah Denda</button>
    </form>

    <a href="{{ route('denda.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
