@extends('layouts.app')

@section('title', 'Daftar Denda')

@section('content')
<div class="container">
    <h2>Daftar Denda</h2>

    <a href="{{ route('denda.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Denda
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Peminjaman</th>
                <th>Jumlah/Hari</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dendas as $denda)
            <tr>
                <td>{{ $denda->id_denda }}</td>
                <td>{{ $denda->peminjaman->buku->judul_buku }} - {{ $denda->peminjaman->siswa->nama }}</td>
                <td>{{ number_format($denda->jumlah_denda_perhari) }}</td>
                <td>{{ number_format($denda->total_denda) }}</td>
                <td>
                    <span class="badge 
                        @if($denda->status_pembayaran == 'Sudah Dibayar') bg-success
                        @else bg-danger
                        @endif">
                        {{ $denda->status_pembayaran }}
                    </span>
                </td>
                <td>{{ $denda->tanggal_pembayaran ?? '-' }}</td>
                <td class="action-buttons">
                    <a href="{{ route('denda.show', $denda->id_denda) }}" class="btn btn-outline btn-sm">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('denda.edit', $denda->id_denda) }}" class="btn btn-outline btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('denda.destroy', $denda->id_denda) }}" method="POST" class="d-inline">
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