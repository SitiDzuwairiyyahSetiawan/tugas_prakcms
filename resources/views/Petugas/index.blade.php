@extends('layouts.app')
@section('content')
<h2 class="mb-4">Daftar Peminjaman</h2>
<ul class="list-group">
@foreach ($peminjaman as $pjm)
    <li class="list-group-item">
        <a href="/peminjaman/{{ $pjm['id'] }}">
            ID Peminjaman: {{ $pjm['id'] }} |  
        </a>
    </li>
@endforeach
</ul>
<a href="/peminjaman/create" class="btn btn-primary mt-3">+ Tambah Peminjaman</a>
@endsection