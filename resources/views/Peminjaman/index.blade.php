@extends('layouts.app')

@section('content')
<h2 class="mb-4">Data Peminjaman</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Buku</th>
            <th>Nama Siswa</th>
            <th>Nama Petugas</th>
            <th>Tanggal Pinjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->buku->judul ?? '-' }}</td>
            <td>{{ $p->siswa->nama ?? '-' }}</td>
            <td>{{ $p->petugas->nama ?? '-' }}</td>
            <td>{{ $p->tanggal_pinjam ?? '-' }}</td>
            <td>
                <a href="/peminjaman/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/peminjaman/{{ $p->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/peminjaman/create" class="btn btn-primary mt-3">+ Tambah Peminjaman</a>
@endsection
