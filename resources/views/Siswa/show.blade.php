@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<h2>Detail Siswa</h2>

<div style="margin-bottom: 20px;">
    <p style="margin-bottom: 8px;"><strong>ID Siswa:</strong> {{ $siswa->id_siswa }}</p>
    <p style="margin-bottom: 8px;"><strong>NISN:</strong> {{ $siswa->nisn }}</p>
    <p style="margin-bottom: 8px;"><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p style="margin-bottom: 8px;"><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
    <p style="margin-bottom: 8px;"><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
    <p style="margin-bottom: 8px;"><strong>Nomor Telepon:</strong> {{ $siswa->nomor_telepon }}</p>
    <p style="margin-bottom: 8px;"><strong>Email:</strong> {{ $siswa->email }}</p>
</div>

<div>
    <a href="{{ route('siswa.edit', $siswa->id_siswa) }}" style="padding: 8px 15px; background-color: #38c172; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit</a>
    
    <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Yakin hapus siswa ini?')">Hapus</button>
    </form>
    
    <a href="{{ route('siswa.index') }}" style="padding: 8px 15px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">← Kembali ke daftar</a>
</div>
@endsection