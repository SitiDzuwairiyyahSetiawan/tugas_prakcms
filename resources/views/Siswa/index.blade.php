@extends('layouts.app')
@section('content')
<h2>Daftar Siswa</h2>
<ul>
@foreach ($siswa as $s)
    <li><a href="/siswa/{{ $s['id'] }}">{{ $s['nama'] }}</a></li>
@endforeach
</ul>
<a href="/siswa/create">+ Tambah Siswa</a>
@endsection
