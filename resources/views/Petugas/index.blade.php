@extends('layouts.app')
@section('content')
<h2 class="mb-4">Daftar Petugas</h2>
<ul class="list-group">
@foreach ($petugas as $ptg)
    <li class="list-group-item">
        <a href="/petugas/{{ $ptg['id'] }}">{{ $ptg['nama'] }}</a>
    </li>
@endforeach
</ul>
<a href="/petugas/create" class="btn btn-primary mt-3">+ Tambah Petugas</a>
@endsection
