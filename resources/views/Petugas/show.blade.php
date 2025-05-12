@extends('layouts.app')

@section('title', 'Detail Petugas')

@section('content')
<h2>Detail Petugas</h2>

<div style="margin-bottom: 20px;">
    <p style="margin-bottom: 8px;"><strong>ID Petugas:</strong> {{ $petugas->id_petugas }}</p>
    <p style="margin-bottom: 8px;"><strong>Nama:</strong> {{ $petugas->nama }}</p>
    <p style="margin-bottom: 8px;"><strong>Username:</strong> {{ $petugas->username }}</p>
    <p style="margin-bottom: 8px;"><strong>Email:</strong> {{ $petugas->email }}</p>
</div>

<div>
    <a href="{{ route('petugas.edit', $petugas->id_petugas) }}" style="padding: 8px 15px; background-color: #38c172; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit</a>
    
    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Yakin hapus petugas ini?')">Hapus</button>
    </form>
    
    <a href="{{ route('petugas.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">← Kembali ke daftar</a>
</div>
@endsection