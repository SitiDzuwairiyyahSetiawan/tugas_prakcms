@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
<div class="container">
    <h2>Tambah Petugas Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('petugas.store') }}" class="form-container">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection