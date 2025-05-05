<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.index', ['petugas' => Petugas::all()]);
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        Petugas::create($request->all());

        return redirect()->route('petugas.index');
    }

    public function show($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.show', compact('petugas'));
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('petugas.show', $id);
    }

    public function destroy($id)
    {
        Petugas::destroy($id);
        return redirect()->route('petugas.index');
    }
}
