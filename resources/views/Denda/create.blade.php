@extends('layouts.app')

@section('title', 'Tambah Denda')

@section('content')
<h2>Tambah Denda Baru</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
        <ul style="list-style-type: none; padding-left: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('denda.store') }}" style="max-width: 500px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Peminjaman:</label>
        <select name="id_peminjaman" required style="width: 100%; padding: 8px;">
            <option value="">Pilih Peminjaman</option>
            @foreach($peminjamans as $peminjaman)
                <option value="{{ $peminjaman->id_peminjaman }}">
                    {{ $peminjaman->buku->judul_buku }} - {{ $peminjaman->siswa->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Jumlah Denda Per Hari:</label>
        <input type="number" name="jumlah_denda_perhari" value="{{ old('jumlah_denda_perhari') }}" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Total Denda:</label>
        <input type="number" name="total_denda" value="{{ old('total_denda') }}" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Status Pembayaran:</label>
        <select name="status_pembayaran" required style="width: 100%; padding: 8px;">
            <option value="Belum Dibayar">Belum Dibayar</option>
            <option value="Sudah Dibayar">Sudah Dibayar</option>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Tanggal Pembayaran:</label>
        <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran') }}" style="width: 100%; padding: 8px;">
    </div>

    <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
</form>

<a href="{{ route('denda.index') }}" style="display: inline-block; margin-top: 20px; color: #3490dc; text-decoration: none;">← Kembali ke daftar denda</a>
@endsection