@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h2>Daftar Buku</h2>

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Buku
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $item)
                <tr>
                    <td>{{ $item->id_buku }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tahun_terbit)->format('Y') }}</td>
                    <td>{{ $item->kategori_buku }}</td>
                    <td>{{ $item->jumlah_buku_tersedia }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('buku.show', $item->id_buku) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection