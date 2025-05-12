@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
<h2>Tambah Petugas Baru</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
        <ul style="list-style-type: none; padding-left: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('petugas.store') }}" style="max-width: 500px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Username:</label>
        <input type="text" name="username" value="{{ old('username') }}" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Password:</label>
        <input type="password" name="password" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px;">
    </div>

    <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
</form>

<a href="{{ route('petugas.index') }}" style="display: inline-block; margin-top: 20px; color: #3490dc; text-decoration: none;">← Kembali ke daftar petugas</a>
@endsection