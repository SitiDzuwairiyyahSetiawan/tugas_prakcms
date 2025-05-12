<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda; // Pastikan Anda import model Denda
use App\Models\Peminjaman;

class DendaController extends Controller
{
    // Menampilkan form tambah denda
    public function create()
    {
        $peminjamans = Peminjaman::all(); // Ambil data peminjaman untuk dropdown
        return view('denda.create', compact('peminjamans'));
    }

    // Menyimpan data denda
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        // Menangani pengisian ID_DENDA
        // Jika ID_DENDA diatur manual atau dengan metode lain
        $denda = new Denda($validated);

        // Misalnya, kita bisa menangani ID_DENDA manual jika perlu
        $denda->id_denda = $this->generateDendaId(); // Contoh generate ID jika perlu

        $denda->save(); // Menyimpan data ke database

        return redirect()->route('denda.index')->with('success', 'Denda berhasil ditambahkan!');
    }

    // Menampilkan form edit denda
    public function edit($id)
    {
        $denda = Denda::findOrFail($id); // Mengambil data Denda berdasarkan ID
        $peminjamans = Peminjaman::all(); // Ambil data Peminjaman untuk dropdown
        return view('denda.edit', compact('denda', 'peminjamans'));
    }

    // Memperbarui data denda
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id_peminjaman',
            'jumlah_denda_perhari' => 'required|numeric|min:0',
            'total_denda' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|string|max:50',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        // Menemukan data denda yang ingin diupdate
        $denda = Denda::findOrFail($id);

        // Memperbarui data denda
        $denda->update($validated);

        return redirect()->route('denda.index')->with('success', 'Denda berhasil diperbarui!');
    }

    // Menghapus data denda
    public function destroy($id)
    {
        // Menemukan denda berdasarkan ID dan menghapusnya
        $denda = Denda::findOrFail($id);
        $denda->delete();

        return redirect()->route('denda.index')->with('success', 'Denda berhasil dihapus!');
    }

    // Fungsi untuk menghasilkan ID_DENDA jika perlu
    private function generateDendaId()
    {
        // Misalnya, generate ID secara manual jika tidak menggunakan sequence
        $lastDenda = Denda::orderBy('id_denda', 'desc')->first();
        return $lastDenda ? $lastDenda->id_denda + 1 : 1;
    }

    public function index()
    {
        // Mengambil semua data denda
        $dendas = Denda::all();
        return view('denda.index', compact('dendas'));
    }

    public function show($id)
    {
        // Cari data denda berdasarkan ID
        $denda = Denda::findOrFail($id);

        // Kembalikan tampilan dengan data denda
        return view('denda.show', compact('denda'));
    }
}
