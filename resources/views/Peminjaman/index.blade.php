@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<h2>Daftar Peminjaman</h2>

<a href="{{ route('peminjaman.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Peminjaman</a>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="padding: 10px; text-align: left;">ID</th>
            <th style="padding: 10px; text-align: left;">Buku</th>
            <th style="padding: 10px; text-align: left;">Siswa</th>
            <th style="padding: 10px; text-align: left;">Tanggal Pinjam</th>
            <th style="padding: 10px; text-align: left;">Tanggal Kembali</th>
            <th style="padding: 10px; text-align: left;">Status</th>
            <th style="padding: 10px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $item)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->id_peminjaman }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->buku->judul_buku }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->siswa->nama }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->tanggal_peminjaman }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->tanggal_pengembalian }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->status_peminjaman }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <a href="{{ route('peminjaman.show', $item->id_peminjaman) }}" style="color: #3490dc; text-decoration: none; margin-right: 10px;">Lihat</a>
                    <a href="{{ route('peminjaman.edit', $item->id_peminjaman) }}" style="color: #38c172; text-decoration: none; margin-right: 10px;">Edit</a>
                    <form action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}" method="POST" style="display: inline;">
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