<?php

namespace App\Http\Controllers\Api;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    public function index()
    {
        $sclass = StudentClass::latest()->get();
        return response()->json($sclass);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        StudentClass::insert([
            'class_name' => $request->class_name,
        ]);

        return response('Student class created successfully!');
    }

    public function show($id)
    {
        $sclass = StudentClass::findOrFail($id);
        return response()->json($sclass);
    }

    public function edit($id)
    {
        $sclass = StudentClass::findOrFail($id);
        return response()->json($sclass);
    }

    public function update(Request $request, $id)
    {
        StudentClass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);
        return response()->json('Student class updated successfully!');
    }

    public function delete($id)
    {
        StudentClass::findOrFail($id)->delete();
        return response()->json('Student class deleted successfully!');
    }
}
