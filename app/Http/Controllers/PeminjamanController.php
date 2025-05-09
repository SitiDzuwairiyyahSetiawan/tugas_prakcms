<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['siswa', 'petugas', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $petugas = Petugas::all();
        $bukus = Buku::all();

        return view('peminjaman.create', compact('siswas', 'petugas', 'bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswas,id_siswa',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status_peminjaman' => 'required|string|max:50',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['siswa', 'petugas', 'buku'])->findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $siswas = Siswa::all();
        $petugas = Petugas::all();
        $bukus = Buku::all();

        return view('peminjaman.edit', compact('peminjaman', 'siswas', 'petugas', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswas,id_siswa',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status_peminjaman' => 'required|string|max:50',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.show', $id);
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index');
    }
}
