<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku.index', [
            'bukus' => Buku::all()
        ]);
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string|size:13',
            'kategori_buku' => 'required|string|max:255',
            'jumlah_buku_tersedia' => 'required|integer|min:1',
        ]);

        Buku::create([
            'judul_buku' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'isbn' => $request->input('isbn'),
            'kategori_buku' => $request->input('kategori_buku'),
            'jumlah_buku_tersedia' => $request->input('jumlah_buku_tersedia'),
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string|size:13',
            'kategori_buku' => 'required|string|max:255',
            'jumlah_buku_tersedia' => 'required|integer|min:1',
        ]);

        // Update data buku
        $buku->update($validated);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('Buku.show', compact('buku'));
    }

}
