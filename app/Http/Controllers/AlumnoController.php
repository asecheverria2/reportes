<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlumnoPostRequest;
use App\Alumno;


class AlumnoController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function show(Request $request, Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(AlumnoPostRequest $request)
    {
        $data = $request->validated();
        $alumno = Alumno::create($data);
        return redirect()->route('alumnos.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(AlumnoPostRequest $request, Alumno $alumno)
    {
        $data = $request->validated();
        $alumno->fill($data);
        $alumno->save();
        return redirect()->route('alumnos.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
