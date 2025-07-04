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
        \Log::info('Mengakses daftar denda');
        return view('denda.index', compact('dendas'));
    }

    public function create()
    {
        $peminjamans = Peminjaman::all();
        \Log::info('Mengakses halaman tambah denda');
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

        try {
            // ID denda akan di-generate otomatis oleh boot method di model
            Denda::create($validated);
            
            \Log::info('Denda berhasil ditambahkan', [
                'id_peminjaman' => $validated['id_peminjaman'],
                'total_denda' => $validated['total_denda']
            ]);
            
            return redirect()->route('denda.index')->with('success', 'Denda berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan denda', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->with('error', 'Gagal menambahkan denda: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            $peminjamans = Peminjaman::all();
            
            \Log::info('Mengakses halaman edit denda', ['id_denda' => $id]);
            
            return view('denda.edit', compact('denda', 'peminjamans'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Denda tidak ditemukan saat edit', [
                'id_denda' => $id,
                'error' => $e->getMessage()
            ]);
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
            
            \Log::info('Denda berhasil diperbarui', ['id_denda' => $id]);
            
            return redirect()->route('denda.index')->with('success', 'Denda berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Denda tidak ditemukan saat update', [
                'id_denda' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui denda', [
                'id_denda' => $id,
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui denda: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            $denda->delete();
            
            \Log::info('Denda berhasil dihapus', ['id_denda' => $id]);
            
            return redirect()->route('denda.index')->with('success', 'Denda berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Denda tidak ditemukan saat hapus', [
                'id_denda' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus denda', [
                'id_denda' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('denda.index')->with('error', 'Gagal menghapus denda: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            \Log::info('Mengakses detail denda', ['id_denda' => $id]);
            return view('denda.show', compact('denda'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Denda tidak ditemukan saat melihat detail', [
                'id_denda' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $denda = Denda::findOrFail($id);
            \Log::info('Mengakses halaman konfirmasi hapus denda', ['id_denda' => $id]);
            return view('denda.delete', compact('denda'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Denda tidak ditemukan saat konfirmasi hapus', [
                'id_denda' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('denda.index')->with('error', 'Data denda tidak ditemukan.');
        }
    }

    private function generateDendaId()
    {
        // Pastikan ID unik dengan mengecek ke database
    do {
        $id = 'DN' . Str::upper(Str::random(13));
        $exists = Denda::where('id_denda', $id)->exists();
    } while ($exists);
    
    return $id;
    }
}