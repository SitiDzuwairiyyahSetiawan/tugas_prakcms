<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('petugas.index', [
            'peminjaman' => Peminjaman::all()
        ]);
    }

    public function show($id)
    {
        return view('peminjaman.show', [
            'peminjaman' => Peminjaman::find($id)
        ]);
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function edit($id)
    {
        return view('peminjaman.edit', [
            'peminjaman' => Peminjaman::find($id)
        ]);
    }

    public function delete($id)
    {
        return view('peminjaman.delete', [
            'peminjaman' => Peminjaman::find($id)
        ]);
    }
}
