<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda;

class DendaController extends Controller
{
    public function index()
    {
        return view('denda.index', [
            'denda' => Denda::all()
        ]);
    }

    public function show($id)
    {
        return view('denda.show', [
            'denda' => Denda::find($id)
        ]);
    }

    public function create()
    {
        return view('denda.create');
    }

    public function edit($id)
    {
        return view('denda.edit', [
            'denda' => Denda::find($id)
        ]);
    }

    public function delete($id)
    {
        return view('denda.delete', [
            'denda' => Denda::find($id)
        ]);
    }
}
