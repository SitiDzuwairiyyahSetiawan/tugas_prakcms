@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container">
    <h2>Tambah Siswa Baru</h2>

    {{-- Menampilkan semua error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Siswa tidak berhasil ditambahkan, data tidak valid:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('siswa.store') }}" class="form-container">
        @csrf
        
        <div class="form-group">
            <label class="form-label">NISN:</label>
            <input type="text" name="nisn" value="{{ old('nisn') }}" class="form-control" required>
            @error('nisn')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Kelas:</label>
            <input type="text" name="kelas" value="{{ old('kelas') }}" class="form-control" required>
            @error('kelas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="form-control" required>
            @error('nomor_telepon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
