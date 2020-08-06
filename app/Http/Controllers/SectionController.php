<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SectionPostRequest;
use App\Section;


class SectionController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    public function show(Request $request, Section $section)
    {
        return view('sections.show', compact('section'));
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(SectionPostRequest $request)
    {
        $data = $request->validated();
        $section = Section::create($data);
        return redirect()->route('sections.index')->with('status', 'Section created!');
    }

    public function edit(Request $request, Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    public function update(SectionPostRequest $request, Section $section)
    {
        $data = $request->validated();
        $section->fill($data);
        $section->save();
        return redirect()->route('sections.index')->with('status', 'Section updated!');
    }

    public function destroy(Request $request, Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('status', 'Section destroyed!');
    }
}
