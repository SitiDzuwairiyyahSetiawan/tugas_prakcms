@extends('layouts.app')

@section('content')
<h2>Hapus Denda</h2>
<p>Yakin ingin menghapus denda ID {{ $denda['id'] }}?</p>
<button disabled>Ya, Hapus (dummy)</button>
<a href="/denda/{{ $denda['id'] }}">Batal</a>
@endsection
