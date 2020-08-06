<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\NotaPostRequest;
use App\Http\Controllers\Controller;
use App\Nota;

class NotaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Nota::all();
    }

    public function show(Request $request, Nota $nota)
    {
        return $nota;
    }

    public function store(NotaPostRequest $request)
    {
        $data = $request->validated();
        $nota = Nota::create($data);
        return $nota;
    }

    public function update(NotaPostRequest $request, Nota $nota)
    {
        $data = $request->validated();
        $nota->fill($data);
        $nota->save();

        return $nota;
    }

    public function destroy(Request $request, Nota $nota)
    {
        $nota->delete();
        return $nota;
    }

}
