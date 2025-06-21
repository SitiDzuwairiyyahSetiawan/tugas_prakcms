<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->has('search')) {
            $query->where('judul_buku', 'like', '%' . $request->search . '%');
        }

        $bukus = $query->get();

        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_buku'            => 'required|string|max:255',
            'penulis'               => 'required|string|max:255',
            'penerbit'              => 'required|string|max:255',
            'tahun_terbit'          => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'isbn'                  => 'required|digits:13',
            'kategori_buku'         => 'required|string|max:255',
            'jumlah_buku_tersedia'  => 'required|integer|min:1',
        ], [
            'judul_buku.required'            => 'Judul buku wajib diisi.',
            'penulis.required'               => 'Penulis wajib diisi.',
            'penerbit.required'              => 'Penerbit wajib diisi.',
            'tahun_terbit.required'          => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits'            => 'Tahun terbit harus 4 digit.',
            'isbn.required'                  => 'ISBN wajib diisi.',
            'isbn.digits'                    => 'ISBN harus terdiri dari 13 digit angka.',
            'kategori_buku.required'         => 'Kategori buku wajib diisi.',
            'jumlah_buku_tersedia.required'  => 'Jumlah buku wajib diisi.',
            'jumlah_buku_tersedia.integer'   => 'Jumlah buku harus berupa angka.',
            'jumlah_buku_tersedia.min'       => 'Jumlah buku minimal 1.',
        ]);

        $validated['id_buku'] = 'BK' . strtoupper(uniqid());

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $buku = Buku::findOrFail($id);
            return view('buku.edit', compact('buku'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $buku = Buku::findOrFail($id);

            $validated = $request->validate([
                'judul_buku'            => 'required|string|max:255',
                'penulis'               => 'required|string|max:255',
                'penerbit'              => 'required|string|max:255',
                'tahun_terbit'          => 'required|digits:4|integer|min:1000|max:' . date('Y'),
                'isbn'                  => 'required|digits:13',
                'kategori_buku'         => 'required|string|max:255',
                'jumlah_buku_tersedia'  => 'required|integer|min:1',
            ], [
                'judul_buku.required'            => 'Judul buku wajib diisi.',
                'penulis.required'               => 'Penulis wajib diisi.',
                'penerbit.required'              => 'Penerbit wajib diisi.',
                'tahun_terbit.required'          => 'Tahun terbit wajib diisi.',
                'tahun_terbit.digits'            => 'Tahun terbit harus 4 digit.',
                'isbn.required'                  => 'ISBN wajib diisi.',
                'isbn.digits'                    => 'ISBN harus terdiri dari 13 digit angka.',
                'kategori_buku.required'         => 'Kategori buku wajib diisi.',
                'jumlah_buku_tersedia.required'  => 'Jumlah buku wajib diisi.',
                'jumlah_buku_tersedia.integer'   => 'Jumlah buku harus berupa angka.',
                'jumlah_buku_tersedia.min'       => 'Jumlah buku minimal 1.',
            ]);

            $buku->update($validated);

            return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $buku = Buku::findOrFail($id);
            $buku->delete();

            return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }

    public function show($id)
    {
        try {
            $buku = Buku::findOrFail($id);
            return view('buku.show', compact('buku'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $buku = Buku::findOrFail($id);
            return view('buku.delete', compact('buku'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
        }
    }
}
