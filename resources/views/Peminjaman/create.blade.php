@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<h2>Tambah Peminjaman Baru</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
        <ul style="list-style-type: none; padding-left: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('peminjaman.store') }}" style="max-width: 500px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Buku:</label>
        <select name="id_buku" required style="width: 100%; padding: 8px;">
            <option value="">Pilih Buku</option>
            @foreach($bukus as $buku)
                <option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Siswa:</label>
        <select name="id_siswa" required style="width: 100%; padding: 8px;">
            <option value="">Pilih Siswa</option>
            @foreach($siswas as $siswa)
                <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Petugas:</label>
        <select name="id_petugas" required style="width: 100%; padding: 8px;">
            <option value="">Pilih Petugas</option>
            @foreach($petugas as $petugas)
                <option value="{{ $petugas->id_petugas }}">{{ $petugas->nama }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Tanggal Peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Tanggal Pengembalian:</label>
        <input type="date" name="tanggal_pengembalian" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Status Peminjaman:</label>
        <select name="status_peminjaman" required style="width: 100%; padding: 8px;">
            <option value="Dipinjam">Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
            <option value="Terlambat Mengembalikan">Terlambat Mengembalikan</option>
        </select>
    </div>

    <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
</form>

<a href="{{ route('peminjaman.index') }}" style="display: inline-block; margin-top: 20px; color: #3490dc; text-decoration: none;">← Kembali ke daftar peminjaman</a>
@endsection