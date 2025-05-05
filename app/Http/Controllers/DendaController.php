<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda;

class DendaController extends Controller
{
    public function index()
    {
        // Load semua data denda beserta relasi peminjaman, buku, dan siswa
        $dendas = Denda::with('peminjaman.buku', 'peminjaman.siswa')->get();
        return view('denda.index', ['denda' => $dendas]);
    }

    public function create()
    {
        $peminjaman = \App\Models\Peminjaman::all(); // pastikan model dan namespace benar
        return view('denda.create', compact('peminjaman'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        Denda::create($request->all());

        return redirect()->route('denda.index');
    }

    public function show($id)
    {
        // Load data denda spesifik dengan relasi yang diperlukan
        $denda = Denda::with('peminjaman.buku', 'peminjaman.siswa')->findOrFail($id);
        return view('denda.show', compact('denda'));
    }

    public function edit($id)
    {
        $denda = Denda::findOrFail($id);
        return view('denda.edit', compact('denda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        $denda = Denda::findOrFail($id);
        $denda->update($request->all());

        return redirect()->route('denda.show', $id);
    }

    public function destroy($id)
    {
        Denda::destroy($id);
        return redirect()->route('denda.index');
    }
}
