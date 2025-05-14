<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda;
use App\Models\Peminjaman;

class DendaController extends Controller
{
    public function create()
    {
        $peminjamans = Peminjaman::all();
        return view('denda.create', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        $denda = new Denda($validated);

        $denda->id_denda = $this->generateDendaId();

        $denda->save();

        return redirect()->route('denda.index')->with('success', 'Denda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $denda = Denda::findOrFail($id);
        $peminjamans = Peminjaman::all();
        return view('denda.edit', compact('denda', 'peminjamans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        $denda = Denda::findOrFail($id);

        $denda->update($validated);

        return redirect()->route('denda.index')->with('success', 'Denda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $denda = Denda::findOrFail($id);
        $denda->delete();

        return redirect()->route('denda.index')->with('success', 'Denda berhasil dihapus!');
    }

    private function generateDendaId()
    {
        $lastDenda = Denda::orderBy('id_denda', 'desc')->first();
        return $lastDenda ? $lastDenda->id_denda + 1 : 1;
    }

    public function index()
    {
        $dendas = Denda::all();
        return view('denda.index', compact('dendas'));
    }

    public function show($id)
    {
        $denda = Denda::findOrFail($id);

        return view('denda.show', compact('denda'));
    }
}
