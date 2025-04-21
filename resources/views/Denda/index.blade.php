@extends('layouts.app')

@section('content')
    <h2>Daftar Denda</h2>
    <ul>
        @foreach ($denda as $d)
            <li><a href="/denda/{{ $d['id'] }}">Denda #{{ $d['id'] }} - {{ $d['status_pembayaran'] }}</a></li>
        @endforeach
    </ul>
    <a href="/denda/create">+ Tambah Denda</a>
@endsection
