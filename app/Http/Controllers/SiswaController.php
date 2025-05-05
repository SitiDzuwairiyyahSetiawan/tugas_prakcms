<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index', ['siswas' => Siswa::all()]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'required|email|max:100',
        ]);

        $siswa = Siswa::create($request->all());

        // Gunakan 'id_siswa' sebagai parameter
        return redirect()->route('siswa.show', $siswa->id_siswa);
    }


    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.show', $id);
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->route('siswa.index');
    }
}
