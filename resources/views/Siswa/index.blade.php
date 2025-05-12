@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<h2>Daftar Siswa</h2>

<a href="{{ route('siswa.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Siswa</a>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="padding: 10px; text-align: left;">ID</th>
            <th style="padding: 10px; text-align: left;">NISN</th>
            <th style="padding: 10px; text-align: left;">Nama</th>
            <th style="padding: 10px; text-align: left;">Kelas</th>
            <th style="padding: 10px; text-align: left;">Email</th>
            <th style="padding: 10px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $item)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->id_siswa }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->nisn }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->nama }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->kelas }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $item->email }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <a href="{{ route('siswa.show', $item->id_siswa) }}" style="color: #3490dc; text-decoration: none; margin-right: 10px;">Lihat</a>
                    <a href="{{ route('siswa.edit', $item->id_siswa) }}" style="color: #38c172; text-decoration: none; margin-right: 10px;">Edit</a>
                    <form action="{{ route('siswa.destroy', $item->id_siswa) }}" method="POST" style="display: inline;">
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