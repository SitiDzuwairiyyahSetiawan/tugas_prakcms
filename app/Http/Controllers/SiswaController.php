<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index', [
            'siswa' => Siswa::all()
        ]);
    }

    public function show($id)
    {
        return view('siswa.show', [
            'siswa' => Siswa::find($id)
        ]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function edit($id)
    {
        return view('siswa.edit', [
            'siswa' => Siswa::find($id)
        ]);
    }

    public function delete($id)
    {
        return view('siswa.delete', [
            'siswa' => Siswa::find($id)
        ]);
    }
}
