<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\MateriaPostRequest;
use App\Http\Controllers\Controller;
use App\Materia;

class MateriaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Materia::all();
    }

    public function show(Request $request, Materia $materia)
    {
        return $materia;
    }

    public function store(MateriaPostRequest $request)
    {
        $data = $request->validated();
        $materia = Materia::create($data);
        return $materia;
    }

    public function update(MateriaPostRequest $request, Materia $materia)
    {
        $data = $request->validated();
        $materia->fill($data);
        $materia->save();

        return $materia;
    }

    public function destroy(Request $request, Materia $materia)
    {
        $materia->delete();
        return $materia;
    }

}
