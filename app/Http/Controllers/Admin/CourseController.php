<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    public function teachers()
    {
         $teachers = User::where('role', 'teacher')->with('courses')->get();
    $courses = Course::all(); // সব courses

    return view('admin.teachers', compact('teachers', 'courses'));
    }
    public function students()
    {
        // Example: fetch all students
        $students = User::where('role', 'student')->get();

        return view('admin.students', compact('students'));
    }
}