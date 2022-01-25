<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',

        ]);

        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
        ]);

        return response('Section created successfully!');
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }

    public function update(Request $request, $id)
    {
        Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
        ]);
        return response()->json('Section updated successfully!');
    }

    public function delete($id)
    {
        Section::findOrFail($id)->delete();
        return response()->json('Section deleted successfully!');
    }
}
