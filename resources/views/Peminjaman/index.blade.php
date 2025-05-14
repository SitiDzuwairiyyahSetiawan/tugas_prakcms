@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman</h2>

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Peminjaman
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Buku</th>
                <th>Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
                <tr>
                    <td>{{ $item->id_peminjaman }}</td>
                    <td>{{ $item->buku->judul_buku }}</td>
                    <td>{{ $item->siswa->nama }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>
                        <span class="badge 
                            @if($item->status_peminjaman == 'Dipinjam') bg-primary
                            @elseif($item->status_peminjaman == 'Dikembalikan') bg-success
                            @else bg-danger
                            @endif">
                            {{ $item->status_peminjaman }}
                        </span>
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('peminjaman.show', $item->id_peminjaman) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('peminjaman.edit', $item->id_peminjaman) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}" method="POST" class="d-inline">
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