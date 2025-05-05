@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h2>Tambah Peminjaman Baru</h2>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <label for="id_buku">ID Buku</label>
        <input type="text" name="id_buku" required><br><br>

        <label for="id_siswa">ID Siswa</label>
        <input type="text" name="id_siswa" required><br><br>

        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_peminjaman" required><br><br>

        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tanggal_pengembalian" required><br><br>

        <label for="status_peminjaman">Status</label>
        <select name="status_peminjaman" required>
            <option value="dipinjam">Dipinjam</option>
            <option value="dikembalikan">Dikembalikan</option>
            <option value="terlambat_mengembalikan">Terlambat Mengembalikan</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>


    <a href="{{ route('peminjaman.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
