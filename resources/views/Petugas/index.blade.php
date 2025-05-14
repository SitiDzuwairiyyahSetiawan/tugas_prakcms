@extends('layouts.app')

@section('title', 'Daftar Petugas')

@section('content')
<div class="container">
    <h2>Daftar Petugas</h2>

    <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Petugas
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $item)
                <tr>
                    <td>{{ $item->id_petugas }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('petugas.show', $item->id_petugas) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('petugas.edit', $item->id_petugas) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('petugas.destroy', $item->id_petugas) }}" method="POST" class="d-inline">
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