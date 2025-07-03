<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['siswa', 'petugas', 'buku'])->get();
        \Log::info('Mengakses daftar peminjaman');
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $petugas = Petugas::all();
        $bukus = Buku::all();

        \Log::info('Mengakses halaman tambah peminjaman');
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

        try {
            $validated['id_peminjaman'] = 'PM' . strtoupper(uniqid());
            Peminjaman::create($validated);
            
            \Log::info('Peminjaman berhasil ditambahkan', [
                'id_siswa' => $validated['id_siswa'],
                'id_buku' => $validated['id_buku']
            ]);
            
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan peminjaman', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->with('error', 'Gagal menambahkan peminjaman: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $peminjaman = Peminjaman::with(['siswa', 'petugas', 'buku'])->findOrFail($id);
            \Log::info('Mengakses detail peminjaman', ['id_peminjaman' => $id]);
            return view('peminjaman.show', compact('peminjaman'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Peminjaman tidak ditemukan saat melihat detail', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $siswas = Siswa::all();
            $petugas = Petugas::all();
            $bukus = Buku::all();

            \Log::info('Mengakses halaman edit peminjaman', ['id_peminjaman' => $id]);
            return view('peminjaman.edit', compact('peminjaman', 'siswas', 'petugas', 'bukus'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Peminjaman tidak ditemukan saat edit', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);

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

            $peminjaman->update($validated);
            
            \Log::info('Peminjaman berhasil diperbarui', ['id_peminjaman' => $id]);
            
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Peminjaman tidak ditemukan saat update', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui peminjaman', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui peminjaman: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->delete();
            
            \Log::info('Peminjaman berhasil dihapus', ['id_peminjaman' => $id]);
            
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Peminjaman tidak ditemukan saat hapus', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus peminjaman', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Gagal menghapus peminjaman: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            \Log::info('Mengakses halaman konfirmasi hapus peminjaman', ['id_peminjaman' => $id]);
            return view('peminjaman.delete', compact('peminjaman'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Peminjaman tidak ditemukan saat konfirmasi hapus', [
                'id_peminjaman' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan.');
        }
    }
}