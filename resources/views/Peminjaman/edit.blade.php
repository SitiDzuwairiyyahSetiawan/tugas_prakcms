@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <h2>Edit Peminjaman</h2>

    <!-- Menampilkan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}">
        @csrf
        @method('PUT')

        <label>Buku:</label><br>
        <select name="id_buku" required>
            @foreach($buku as $item)
                <option value="{{ $item->id_buku }}" {{ old('id_buku', $item->id_buku) == $peminjaman->id_buku ? 'selected' : '' }}>{{ $item->judul_buku }}</option>
            @endforeach
        </select><br><br>

        <label>Siswa:</label><br>
        <select name="id_siswa" required>
            @foreach($siswa as $item)
                <option value="{{ $item->id_siswa }}" {{ old('id_siswa', $item->id_siswa) == $peminjaman->id_siswa ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
        </select><br><br>

        <label>Petugas:</label><br>
        <select name="id_petugas" required>
            @foreach($petugas as $item)
                <option value="{{ $item->id_petugas }}" {{ old('id_petugas', $item->id_petugas) == $peminjaman->id_petugas ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
        </select><br><br>

        <label>Tanggal Peminjaman:</label><br>
        <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman) }}" required><br><br>

        <label>Tanggal Pengembalian:</label><br>
        <input type="date" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', $peminjaman->tanggal_pengembalian) }}" required><br><br>

        <label>Status Peminjaman:</label><br>
        <select name="status_peminjaman" required>
            <option value="Dipinjam" {{ old('status_peminjaman', $peminjaman->status_peminjaman) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="Kembali" {{ old('status_peminjaman', $peminjaman->status_peminjaman) == 'Kembali' ? 'selected' : '' }}>Kembali</option>
        </select><br><br>

        <button type="submit">Update Peminjaman</button>
    </form>

    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary" style="margin-top: 20px; display:inline-block;">← Kembali ke daftar</a>
@endsection
