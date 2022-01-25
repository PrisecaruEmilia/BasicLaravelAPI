<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::latest()->get();
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:students|max:25',
            'email' => 'required|unique:students|max:25',
        ]);

        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),

        ]);

        return response('Student created successfully!');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        Student::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
        ]);
        return response()->json('Student updated successfully!');
    }
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return response()->json('Student deleted successfully!');
    }
}
