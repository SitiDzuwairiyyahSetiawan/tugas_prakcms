@extends('layouts.app')

@section('title', 'Daftar Petugas')

@section('content')
<h2>Daftar Petugas</h2>

<a href="{{ route('petugas.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Petugas</a>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="padding: 10px; text-align: left;">ID</th>
            <th style="padding: 10px; text-align: left;">Nama</th>
            <th style="padding: 10px; text-align: left;">Username</th>
            <th style="padding: 10px; text-align: left;">Email</th>
            <th style="padding: 10px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($petugas as $item)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->id_petugas }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->nama }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->username }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->email }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <a href="{{ route('petugas.show', $item->id_petugas) }}" style="color: #3490dc; text-decoration: none; margin-right: 10px;">Lihat</a>
                    <a href="{{ route('petugas.edit', $item->id_petugas) }}" style="color: #38c172; text-decoration: none; margin-right: 10px;">Edit</a>
                    <form action="{{ route('petugas.destroy', $item->id_petugas) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #dc3545; background: none; border: none; cursor: pointer; padding: 0; text-decoration: underline;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection