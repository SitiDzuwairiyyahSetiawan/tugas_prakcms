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
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswas,id_siswa',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status_peminjaman' => 'required|string|max:50',
        ], [
            'id_siswa.required' => 'Siswa wajib dipilih.',
            'id_siswa.exists' => 'Siswa tidak ditemukan.',
            'id_petugas.required' => 'Petugas wajib dipilih.',
            'id_petugas.exists' => 'Petugas tidak ditemukan.',
            'id_buku.required' => 'Buku wajib dipilih.',
            'id_buku.exists' => 'Buku tidak ditemukan.',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman wajib diisi.',
            'tanggal_peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal yang valid.',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian wajib diisi.',
            'tanggal_pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal yang valid.',
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian tidak boleh sebelum tanggal peminjaman.',
            'status_peminjaman.required' => 'Status peminjaman wajib diisi.',
            'status_peminjaman.string' => 'Status peminjaman harus berupa teks.',
            'status_peminjaman.max' => 'Status peminjaman maksimal 50 karakter.',
        ]);

        $validated['id_peminjaman'] = 'PM' . strtoupper(uniqid());

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
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
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswas,id_siswa',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status_peminjaman' => 'required|string|max:50',
        ], [
            'id_siswa.required' => 'Siswa wajib dipilih.',
            'id_siswa.exists' => 'Siswa tidak ditemukan.',
            'id_petugas.required' => 'Petugas wajib dipilih.',
            'id_petugas.exists' => 'Petugas tidak ditemukan.',
            'id_buku.required' => 'Buku wajib dipilih.',
            'id_buku.exists' => 'Buku tidak ditemukan.',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman wajib diisi.',
            'tanggal_peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal yang valid.',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian wajib diisi.',
            'tanggal_pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal yang valid.',
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian tidak boleh sebelum tanggal peminjaman.',
            'status_peminjaman.required' => 'Status peminjaman wajib diisi.',
            'status_peminjaman.string' => 'Status peminjaman harus berupa teks.',
            'status_peminjaman.max' => 'Status peminjaman maksimal 50 karakter.',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
