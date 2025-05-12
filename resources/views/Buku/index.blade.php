@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<h2>Daftar Buku</h2>

<a href="{{ route('buku.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Buku</a>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="padding: 10px; text-align: left;">ID</th>
            <th style="padding: 10px; text-align: left;">Judul</th>
            <th style="padding: 10px; text-align: left;">Penulis</th>
            <th style="padding: 10px; text-align: left;">Penerbit</th>
            <th style="padding: 10px; text-align: left;">Tahun Terbit</th>
            <th style="padding: 10px; text-align: left;">Kategori</th>
            <th style="padding: 10px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $item)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->id_buku }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->judul_buku }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->penulis }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->penerbit }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ \Carbon\Carbon::parse($item->tahun_terbit)->format('Y') }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->kategori_buku }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <a href="{{ route('buku.show', $item->id_buku) }}" style="color: #3490dc; text-decoration: none; margin-right: 10px;">Lihat</a>
                    <a href="{{ route('buku.edit', $item->id_buku) }}" style="color: #38c172; text-decoration: none; margin-right: 10px;">Edit</a>
                    <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" style="display: inline;">
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