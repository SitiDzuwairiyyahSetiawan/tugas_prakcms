<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        \Log::info('Mengakses daftar petugas');
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        \Log::info('Mengakses halaman tambah petugas');
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:petugas,username',
            'password' => 'required|string|min:8|max:15',
            'email'    => 'required|email|max:100|unique:petugas,email',
        ], [
            'nama.required'     => 'Nama petugas wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username sudah digunakan.',
            'username.max'      => 'Username maksimal 50 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 8 karakter.',
            'password.max'      => 'Password maksimal 15 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.max'         => 'Email maksimal 100 karakter.',
            'email.unique'      => 'Email sudah digunakan.',
        ]);

        try {
            $validated['password'] = bcrypt($validated['password']);
            $validated['id_petugas'] = 'PT' . strtoupper(uniqid());
            
            Petugas::create($validated);
            
            \Log::info('Petugas berhasil ditambahkan', ['username' => $validated['username']]);
            
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan petugas', [
                'error' => $e->getMessage(),
                'request' => $request->except('password'),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->with('error', 'Gagal menambahkan petugas: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            \Log::info('Mengakses detail petugas', ['id_petugas' => $id]);
            return view('petugas.show', compact('petugas'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Petugas tidak ditemukan saat melihat detail', [
                'id_petugas' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Data petugas tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            \Log::info('Mengakses halaman edit petugas', ['id_petugas' => $id]);
            return view('petugas.edit', compact('petugas'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Petugas tidak ditemukan saat edit', [
                'id_petugas' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Data petugas tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $petugas = Petugas::findOrFail($id);

            $validated = $request->validate([
                'nama'     => 'required|string|max:100',
                'username' => 'required|string|max:50|unique:petugas,username,' . $petugas->id_petugas . ',id_petugas',
                'email'    => 'required|email|max:100|unique:petugas,email,' . $petugas->id_petugas . ',id_petugas',
                'password' => 'nullable|string|min:8|max:15',
            ], [
                'nama.required'     => 'Nama petugas wajib diisi.',
                'username.required' => 'Username wajib diisi.',
                'username.unique'   => 'Username sudah digunakan.',
                'username.max'      => 'Username maksimal 50 karakter.',
                'email.required'    => 'Email wajib diisi.',
                'email.email'       => 'Format email tidak valid.',
                'email.max'         => 'Email maksimal 100 karakter.',
                'email.unique'      => 'Email sudah digunakan.',
                'password.min'      => 'Password minimal 8 karakter.',
                'password.max'      => 'Password maksimal 15 karakter.',
            ]);

            if (!empty($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            } else {
                unset($validated['password']);
            }

            $petugas->update($validated);
            
            \Log::info('Petugas berhasil diperbarui', ['id_petugas' => $id, 'username' => $validated['username']]);
            
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Petugas tidak ditemukan saat update', [
                'id_petugas' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Data petugas tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui petugas', [
                'id_petugas' => $id,
                'error' => $e->getMessage(),
                'request' => $request->except('password'),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui petugas: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            $petugas->delete();
            
            \Log::info('Petugas berhasil dihapus', ['id_petugas' => $id]);
            
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            \Log::error('Petugas tidak ditemukan saat hapus', [
                'id_petugas' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Data petugas tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus petugas', [
                'id_petugas' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Gagal menghapus petugas: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            \Log::info('Mengakses halaman konfirmasi hapus petugas', ['id_petugas' => $id]);
            return view('petugas.delete', compact('petugas'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Petugas tidak ditemukan saat konfirmasi hapus', [
                'id_petugas' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('petugas.index')->with('error', 'Data petugas tidak ditemukan.');
        }
    }
}