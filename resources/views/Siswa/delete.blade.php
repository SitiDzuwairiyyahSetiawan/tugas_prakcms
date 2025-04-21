@extends('layouts.app')
@section('content')
<h2>Hapus Siswa</h2>
<p>Yakin ingin menghapus <strong>{{ $siswa['nama'] }}</strong>?</p>
<button disabled>Ya, Hapus</button>
<a href="/siswa/{{ $siswa['id'] }}">Batal</a>
@endsection
