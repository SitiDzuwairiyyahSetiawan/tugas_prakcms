@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')
<div class="container">
    <h2>Edit Petugas</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('petugas.update', $petugas->id_petugas) }}" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $petugas->nama) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Username:</label>
            <input type="text" name="username" value="{{ old('username', $petugas->username) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
        </div>

        <div class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="{{ old('email', $petugas->email) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection