<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.index', [
            'petugas' => Petugas::all()
        ]);
    }

    public function show($id)
    {
        return view('petugas.show', [
            'petugas' => Petugas::find($id)
        ]);
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function edit($id)
    {
        return view('petugas.edit', [
            'petugas' => Petugas::find($id)
        ]);
    }

    public function delete($id)
    {
        return view('petugas.delete', [
            'petugas' => Petugas::find($id)
        ]);
    }
}
