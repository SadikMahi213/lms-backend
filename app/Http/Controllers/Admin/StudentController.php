<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class StudentController extends Controller
{
    public function index()
    {
         $students = Student::orderBy('created_at', 'desc')->get();
        return view('admin.students', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'course' => 'nullable|string|max:255',
        ]);

        Student::create($request->only('name', 'email', 'phone', 'course'));

        return redirect()->route('admin.students.index')
                         ->with('success', 'Student added successfully!');
    }
    public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('admin.students-edit', compact('student')); // নতুন blade view
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->update($request->only(['name','email'])); // প্রয়োজনীয় fields
    return redirect()->route('admin.students.index')->with('success','Student updated!');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('admin.students.index')->with('success','Student deleted!');
}
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt',
    ]);

    Excel::import(new StudentsImport, $request->file('file'));

    return redirect()->back()->with('success', 'Students imported successfully!');
}

}
