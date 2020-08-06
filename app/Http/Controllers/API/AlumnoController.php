<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\AlumnoPostRequest;
use App\Http\Controllers\Controller;
use App\Alumno;

class AlumnoController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Alumno::all();
    }

    public function show(Request $request, Alumno $alumno)
    {
        return $alumno;
    }

    public function store(AlumnoPostRequest $request)
    {
        $data = $request->validated();
        $alumno = Alumno::create($data);
        return $alumno;
    }

    public function update(AlumnoPostRequest $request, Alumno $alumno)
    {
        $data = $request->validated();
        $alumno->fill($data);
        $alumno->save();

        return $alumno;
    }

    public function destroy(Request $request, Alumno $alumno)
    {
        $alumno->delete();
        return $alumno;
    }

}
