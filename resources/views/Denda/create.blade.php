@extends('layouts.app')

@section('title', 'Tambah Denda')

@section('content')
<div class="container">
    <h2>Tambah Denda Baru</h2>

    {{-- Menampilkan semua error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Denda tidak berhasil ditambahkan, data tidak valid:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('denda.store') }}" class="form-container">
        @csrf

        <div class="form-group">
            <label class="form-label">Peminjaman:</label>
            <select name="id_peminjaman" class="form-control" required>
                <option value="">Pilih Peminjaman</option>
                @foreach($peminjamans as $peminjaman)
                    <option value="{{ $peminjaman->id_peminjaman }}" {{ old('id_peminjaman') == $peminjaman->id_peminjaman ? 'selected' : '' }}>
                        {{ $peminjaman->buku->judul_buku }} - {{ $peminjaman->siswa->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_peminjaman')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Denda Per Hari:</label>
            <input type="text" name="jumlah_denda_perhari" value="{{ old('jumlah_denda_perhari') }}" class="form-control" required>
            @error('jumlah_denda_perhari')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Total Denda:</label>
            <input type="text" name="total_denda" value="{{ old('total_denda') }}" class="form-control" required>
            @error('total_denda')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status Pembayaran:</label>
            <select name="status_pembayaran" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="Belum Dibayar" {{ old('status_pembayaran') == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="Sudah Dibayar" {{ old('status_pembayaran') == 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
            </select>
            @error('status_pembayaran')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Pembayaran:</label>
            <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran') }}" class="form-control">
            @error('tanggal_pembayaran')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('denda.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
