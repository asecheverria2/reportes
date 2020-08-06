<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SectionPostRequest;
use App\Http\Controllers\Controller;
use App\Section;

class SectionController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Section::all();
    }

    public function show(Request $request, Section $section)
    {
        return $section;
    }

    public function store(SectionPostRequest $request)
    {
        $data = $request->validated();
        $section = Section::create($data);
        return $section;
    }

    public function update(SectionPostRequest $request, Section $section)
    {
        $data = $request->validated();
        $section->fill($data);
        $section->save();

        return $section;
    }

    public function destroy(Request $request, Section $section)
    {
        $section->delete();
        return $section;
    }

}
