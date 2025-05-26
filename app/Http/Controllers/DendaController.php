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
        ], [
            'id_peminjaman.required' => 'Peminjaman wajib dipilih.',
            'id_peminjaman.exists' => 'Peminjaman tidak ditemukan.',
            'jumlah_denda_perhari.required' => 'Jumlah denda per hari wajib diisi.',
            'jumlah_denda_perhari.numeric' => 'Jumlah denda per hari harus berupa angka.',
            'jumlah_denda_perhari.min' => 'Jumlah denda per hari tidak boleh negatif.',
            'total_denda.required' => 'Total denda wajib diisi.',
            'total_denda.numeric' => 'Total denda harus berupa angka.',
            'total_denda.min' => 'Total denda tidak boleh negatif.',
            'status_pembayaran.required' => 'Status pembayaran wajib diisi.',
            'status_pembayaran.string' => 'Status pembayaran harus berupa teks.',
            'status_pembayaran.max' => 'Status pembayaran maksimal 50 karakter.',
            'tanggal_pembayaran.date' => 'Tanggal pembayaran harus berupa tanggal yang valid.',
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
        ], [
            'id_peminjaman.required' => 'Peminjaman wajib dipilih.',
            'id_peminjaman.exists' => 'Peminjaman tidak ditemukan.',
            'jumlah_denda_perhari.required' => 'Jumlah denda per hari wajib diisi.',
            'jumlah_denda_perhari.numeric' => 'Jumlah denda per hari harus berupa angka.',
            'jumlah_denda_perhari.min' => 'Jumlah denda per hari tidak boleh negatif.',
            'total_denda.required' => 'Total denda wajib diisi.',
            'total_denda.numeric' => 'Total denda harus berupa angka.',
            'total_denda.min' => 'Total denda tidak boleh negatif.',
            'status_pembayaran.required' => 'Status pembayaran wajib diisi.',
            'status_pembayaran.string' => 'Status pembayaran harus berupa teks.',
            'status_pembayaran.max' => 'Status pembayaran maksimal 50 karakter.',
            'tanggal_pembayaran.date' => 'Tanggal pembayaran harus berupa tanggal yang valid.',
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
