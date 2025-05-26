@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container">
    <h2>Tambah Peminjaman Baru</h2>

    {{-- Menampilkan semua error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Peminjaman tidak berhasil ditambahkan, data tidak valid:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('peminjaman.store') }}" class="form-container">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Buku:</label>
            <select name="id_buku" class="form-control" required>
                <option value="">Pilih Buku</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id_buku }}" {{ old('id_buku') == $buku->id_buku ? 'selected' : '' }}>
                        {{ $buku->judul_buku }}
                    </option>
                @endforeach
            </select>
            @error('id_buku')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Siswa:</label>
            <select name="id_siswa" class="form-control" required>
                <option value="">Pilih Siswa</option>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id_siswa }}" {{ old('id_siswa') == $siswa->id_siswa ? 'selected' : '' }}>
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_siswa')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Petugas:</label>
            <select name="id_petugas" class="form-control" required>
                <option value="">Pilih Petugas</option>
                @foreach($petugas as $petugasItem)
                    <option value="{{ $petugasItem->id_petugas }}" {{ old('id_petugas') == $petugasItem->id_petugas ? 'selected' : '' }}>
                        {{ $petugasItem->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_petugas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', date('Y-m-d')) }}" class="form-control" required>
            @error('tanggal_peminjaman')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Pengembalian:</label>
            <input type="date" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', date('Y-m-d', strtotime('+7 days'))) }}" class="form-control" required>
            @error('tanggal_pengembalian')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status Peminjaman:</label>
            <select name="status_peminjaman" class="form-control" required>
                <option value="Dipinjam" {{ old('status_peminjaman') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ old('status_peminjaman') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="Terlambat Mengembalikan" {{ old('status_peminjaman') == 'Terlambat Mengembalikan' ? 'selected' : '' }}>Terlambat Mengembalikan</option>
            </select>
            @error('status_peminjaman')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
