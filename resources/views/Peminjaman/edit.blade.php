@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="container">
    <h2>Edit Peminjaman</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Buku:</label>
            <select name="id_buku" class="form-control" required>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id_buku }}" {{ $buku->id_buku == $peminjaman->id_buku ? 'selected' : '' }}>
                        {{ $buku->judul_buku }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Siswa:</label>
            <select name="id_siswa" class="form-control" required>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id_siswa }}" {{ $siswa->id_siswa == $peminjaman->id_siswa ? 'selected' : '' }}>
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Petugas:</label>
            <select name="id_petugas" class="form-control" required>
                @foreach($petugas as $petugasItem)
                    <option value="{{ $petugasItem->id_petugas }}" {{ $petugasItem->id_petugas == $peminjaman->id_petugas ? 'selected' : '' }}>
                        {{ $petugasItem->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Pengembalian:</label>
            <input type="date" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', $peminjaman->tanggal_pengembalian) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Status Peminjaman:</label>
            <select name="status_peminjaman" class="form-control" required>
                <option value="Dipinjam" {{ $peminjaman->status_peminjaman == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ $peminjaman->status_peminjaman == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="Terlambat Mengembalikan" {{ $peminjaman->status_peminjaman == 'Terlambat Mengembalikan' ? 'selected' : '' }}>Terlambat Mengembalikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection