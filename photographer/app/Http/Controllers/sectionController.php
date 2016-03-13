<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Section;

class sectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {

        $sections = Section::all();

        return view('photograpViews.album')->withSections($sections);

    }


    public function Create()
    {

    }


    public function store(Request $request)
    {

        $section_name = $request->input('section_name');
        $section_url = $request->input('section_url');

        $new_section = new Section();
        $new_section->section_name = $section_name;
        $new_section->section_url = $section_url;

        $new_section->save();

        return redirect('control');
    }


    public function show()
    {

    }


    public function edit()
    {

    }


    public function update($id, Request $request)

    {
        $section_name = $request->input('section_name');
        $section_url = $request->input('section_url');

        $section = Section::find($id);
        $section -> section_name = $section_name;
        $section -> section_url =  $section_url;

        $section->save();
        return redirect('control');
    }

    public function destroy($id)
    {
        Section::destroy($id);
        return redirect('control');

    }
}

