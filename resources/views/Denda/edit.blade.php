@extends('layouts.app')

@section('title', 'Edit Denda')

@section('content')
<div class="container">
    <h2>Edit Denda</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('denda.update', $denda->id_denda) }}" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Peminjaman:</label>
            <select name="id_peminjaman" class="form-control" required>
                @foreach($peminjamans as $peminjaman)
                    <option value="{{ $peminjaman->id_peminjaman }}" {{ $peminjaman->id_peminjaman == $denda->id_peminjaman ? 'selected' : '' }}>
                        {{ $peminjaman->buku->judul_buku }} - {{ $peminjaman->siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Denda Per Hari:</label>
            <input type="number" name="jumlah_denda_perhari" value="{{ old('jumlah_denda_perhari', $denda->jumlah_denda_perhari) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Total Denda:</label>
            <input type="number" name="total_denda" value="{{ old('total_denda', $denda->total_denda) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Status Pembayaran:</label>
            <select name="status_pembayaran" class="form-control" required>
                <option value="Belum Dibayar" {{ $denda->status_pembayaran == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="Sudah Dibayar" {{ $denda->status_pembayaran == 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Pembayaran:</label>
            <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', $denda->tanggal_pembayaran) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('denda.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection