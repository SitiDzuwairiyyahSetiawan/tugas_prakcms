@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container">
    <h2>Daftar Siswa</h2>

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Siswa
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $item)
                <tr>
                    <td>{{ $item->id_siswa }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('siswa.show', $item->id_siswa) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('siswa.edit', $item->id_siswa) }}" class="btn btn-outline btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}" method="POST" class="d-inline">
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