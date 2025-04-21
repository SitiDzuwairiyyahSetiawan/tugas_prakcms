@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>
    <ul>
        @foreach ($buku as $b)
            <li><a href="/buku/{{ $b['id'] }}">{{ $b['judul'] }}</a></li>
        @endforeach
    </ul>
    <a href="/buku/create" class="btn btn-primary mt-3">+ Tambah Buku</a>
@endsection
