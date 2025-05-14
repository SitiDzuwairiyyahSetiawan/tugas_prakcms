@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container">
    <h2>Tambah Siswa Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
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
        </div>

        <div class="form-group">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Kelas:</label>
            <input type="text" name="kelas" value="{{ old('kelas') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
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