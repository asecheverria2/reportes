<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NotaPostRequest;
use App\Nota;


class NotaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $notas = Nota::all();
        return view('notas.index', compact('notas'));
    }

    public function show(Request $request, Nota $nota)
    {
        return view('notas.show', compact('nota'));
    }

    public function create()
    {
        return view('notas.create');
    }

    public function store(NotaPostRequest $request)
    {
        $data = $request->validated();
        $nota = Nota::create($data);
        return redirect()->route('notas.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Nota $nota)
    {
        return view('notas.edit', compact('nota'));
    }

    public function update(NotaPostRequest $request, Nota $nota)
    {
        $data = $request->validated();
        $nota->fill($data);
        $nota->save();
        return redirect()->route('notas.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Nota $nota)
    {
        $nota->delete();
        return redirect()->route('notas.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
