<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Denda;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = Denda::all();
        return view('denda.index', compact('dendas'));
    }

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

        $validated['id_denda'] = $this->generateDendaId();

        Denda::create($validated);

        return redirect()->route('denda.index')->with('success', 'Denda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            $peminjamans = Peminjaman::all();
            return view('denda.edit', compact('denda', 'peminjamans'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $denda = Denda::findOrFail($id);

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

            $denda->update($validated);

            return redirect()->route('denda.index')->with('success', 'Denda berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            $denda->delete();

            return redirect()->route('denda.index')->with('success', 'Denda berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    public function show($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            return view('denda.show', compact('denda'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            return view('denda.delete', compact('denda'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    private function generateDendaId()
    {
        return 'DN' . Str::upper(Str::random(13));
    }
}
