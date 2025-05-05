@extends('layouts.app')

@section('title', 'Edit Denda')

@section('content')
    <h2>Edit Denda</h2>

    <form method="POST" action="{{ route('denda.update', $denda->id_denda) }}">
        @csrf
        @method('PUT')

        <label>Peminjaman:</label><br>
        <select name="id_peminjaman" required>
            @foreach($peminjaman as $item)
                <option value="{{ $item->id_peminjaman }}" {{ $item->id_peminjaman == $denda->id_peminjaman ? 'selected' : '' }}>
                    {{ $item->buku->judul_buku }} - {{ $item->siswa->nama }}
                </option>
            @endforeach
        </select><br><br>

        <label>Jumlah Denda Per Hari:</label><br>
        <input type="number" name="jumlah_denda_perhari" value="{{ $denda->jumlah_denda_perhari }}" required><br><br>

        <label>Total Denda:</label><br>
        <input type="number" name="total_denda" value="{{ $denda->total_denda }}" required><br><br>

        <label>Status Pembayaran:</label><br>
        <select name="status_pembayaran" required>
            <option value="Belum Dibayar" {{ $denda->status_pembayaran == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
            <option value="Sudah Dibayar" {{ $denda->status_pembayaran == 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
        </select><br><br>

        <label>Tanggal Pembayaran:</label><br>
        <input type="date" name="tanggal_pembayaran" value="{{ $denda->tanggal_pembayaran }}"><br><br>

        <button type="submit">Update Denda</button>
    </form>

    <a href="{{ route('denda.index') }}" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
