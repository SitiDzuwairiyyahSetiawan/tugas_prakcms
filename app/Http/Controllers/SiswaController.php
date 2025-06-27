<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        \Log::info('Mengakses daftar siswa');
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        \Log::info('Mengakses halaman tambah siswa');
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'           => 'required|string|max:20|unique:siswas,nisn',
            'nama'           => 'required|string|max:100',
            'kelas'          => 'required|string|max:50',
            'alamat'         => 'required|string',
            'nomor_telepon'  => 'required|string|max:15',
            'email'          => 'required|email|max:100|unique:siswas,email',
        ], [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.max'               => 'NISN maksimal 20 karakter.',
            'nisn.unique'            => 'NISN sudah terdaftar.',
            'nama.required'          => 'Nama wajib diisi.',
            'nama.max'               => 'Nama maksimal 100 karakter.',
            'kelas.required'         => 'Kelas wajib diisi.',
            'kelas.max'              => 'Kelas maksimal 50 karakter.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.max'      => 'Nomor telepon maksimal 15 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.max'              => 'Email maksimal 100 karakter.',
            'email.unique'           => 'Email sudah digunakan.',
        ]);

        $validated['id_siswa'] = 'SW' . strtoupper(uniqid());

        try {
            Siswa::create($validated);
            
            \Log::info('Siswa berhasil ditambahkan', ['data' => $validated]);
            
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan siswa', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->with('error', 'Gagal menambahkan siswa: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            \Log::info('Mengakses detail siswa', ['id_siswa' => $id]);
            return view('siswa.show', compact('siswa'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Siswa tidak ditemukan saat melihat detail', [
                'id_siswa' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            \Log::info('Mengakses halaman edit siswa', ['id_siswa' => $id]);
            return view('siswa.edit', compact('siswa'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Siswa tidak ditemukan saat edit', [
                'id_siswa' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $siswa = Siswa::findOrFail($id);

            $validated = $request->validate([
                'nisn'           => 'required|string|max:20|unique:siswas,nisn,' . $siswa->id_siswa . ',id_siswa',
                'nama'           => 'required|string|max:100',
                'kelas'          => 'required|string|max:50',
                'alamat'         => 'required|string',
                'nomor_telepon'  => 'required|string|max:15',
                'email'          => 'required|email|max:100|unique:siswas,email,' . $siswa->id_siswa . ',id_siswa',
            ], [
                'nisn.required'          => 'NISN wajib diisi.',
                'nisn.max'               => 'NISN maksimal 20 karakter.',
                'nisn.unique'            => 'NISN sudah terdaftar.',
                'nama.required'          => 'Nama wajib diisi.',
                'nama.max'               => 'Nama maksimal 100 karakter.',
                'kelas.required'         => 'Kelas wajib diisi.',
                'kelas.max'              => 'Kelas maksimal 50 karakter.',
                'alamat.required'        => 'Alamat wajib diisi.',
                'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
                'nomor_telepon.max'      => 'Nomor telepon maksimal 15 karakter.',
                'email.required'         => 'Email wajib diisi.',
                'email.email'            => 'Format email tidak valid.',
                'email.max'              => 'Email maksimal 100 karakter.',
                'email.unique'           => 'Email sudah digunakan.',
            ]);

            $siswa->update($validated);
            
            \Log::info('Siswa berhasil diperbarui', ['id_siswa' => $id, 'data' => $validated]);
            
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Siswa tidak ditemukan saat update', [
                'id_siswa' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui siswa', [
                'id_siswa' => $id,
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui siswa: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();
            
            \Log::info('Siswa berhasil dihapus', ['id_siswa' => $id]);
            
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Siswa tidak ditemukan saat hapus', [
                'id_siswa' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus siswa', [
                'id_siswa' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Gagal menghapus siswa: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            \Log::info('Mengakses halaman konfirmasi hapus siswa', ['id_siswa' => $id]);
            return view('siswa.delete', compact('siswa'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Siswa tidak ditemukan saat konfirmasi hapus', [
                'id_siswa' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan.');
        }
    }
}