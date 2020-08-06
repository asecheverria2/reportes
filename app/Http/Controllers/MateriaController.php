<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MateriaPostRequest;
use App\Materia;


class MateriaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function show(Request $request, Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(MateriaPostRequest $request)
    {
        $data = $request->validated();
        $materia = Materia::create($data);
        return redirect()->route('materias.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(MateriaPostRequest $request, Materia $materia)
    {
        $data = $request->validated();
        $materia->fill($data);
        $materia->save();
        return redirect()->route('materias.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
