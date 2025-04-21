@extends('layouts.app')

@section('title', 'Hapus Buku')

@section('content')
    <h2>Yakin ingin menghapus buku ini?</h2>

    <div class="mb-3">
        <p><strong>{{ $buku['judul'] }}</strong></p>
        <p>{{ $buku['penulis'] }} | {{ $buku['penerbit'] }}</p>
    </div>

    <button disabled class="btn btn-danger">Ya, hapus (dummy)</button>
    <a href="/buku/{{ $buku['id'] }}" class="btn btn-secondary">Batal</a>
@endsection
