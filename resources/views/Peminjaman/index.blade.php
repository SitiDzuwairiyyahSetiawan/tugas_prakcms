@extends('layouts.main')
@section('content')
<h2>Data Peminjaman</h2>
<ul>
@foreach ($peminjaman as $p)
    <li><a href="/peminjaman/{{ $p['id'] }}">Peminjaman #{{ $p['id'] }}</a></li>
@endforeach
</ul>
<a href="/peminjaman/create">+ Tambah</a>
@endsection
