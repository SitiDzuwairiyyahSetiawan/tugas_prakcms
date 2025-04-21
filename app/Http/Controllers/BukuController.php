<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku.index', [
            'buku' => Buku::all()
        ]);
    }

    public function create()
    {
        return view('buku.create');
    }

    public function show($id)
    {
        return view('buku.show', [
            'buku' => Buku::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('buku.edit', [
            'buku' => Buku::find($id)
        ]);
    }

    public function delete($id)
    {
        return view('buku.delete', [
            'buku' => Buku::find($id)
        ]);
    }
}