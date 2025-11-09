<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
    public function courses()
    {
        // Fetch all courses with teacher and students relationships
        $courses = Course::with(['teacher', 'students'])->get();
        $total_courses = $courses->count();

        return view('admin.courses', compact('courses', 'total_courses'));
    }

    public function teachers()
    {
        $teachers = \App\Models\User::where('role', 'teacher')->with('courses')->get();
        return view('admin.teachers', compact('teachers'));
    }

    public function students()
    {
        $students = \App\Models\User::where('role', 'student')->get();
        return view('admin.students', compact('students'));
    }

    public function library()
    {
        $courses = Course::all();
        return view('admin.library', compact('courses'));
    }
     public function index()
    {
          $teachers = User::where('role', 'teacher')->get(); // <-- add this
        $courses = Course::with('teacher')
            ->withCount('students')
            ->get();

        $total_courses = $courses->count();

        return view('admin.courses', compact('courses', 'total_courses', 'teachers'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'materials.*' => 'nullable|file|max:10240',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->short_description = $request->short_description;
        $course->status = 'published'; // default
        $course->teacher_id = auth()->id(); // logged-in admin or teacher
        $course->enrolled_count = 0;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $course->thumbnail = $path;
        }

        $course->save();

        // Handle materials upload
        if ($request->hasFile('materials')) {
            foreach ($request->file('materials') as $file) {
                $file->store('course_materials/' . $course->id, 'public');
            }
        }

        return redirect()->route('admin.courses.index')->with('success', 'Course published successfully!');
    }
     public function show($id)
    {
        $course = Course::with('teacher', 'students')->findOrFail($id);
        return view('admin.course.show', compact('course'));
    }
      public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.courses_edit', compact('course', 'teachers'));
    }
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'teacher_id' => 'required|exists:users,id',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $course->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'teacher_id' => $request->teacher_id,
        ]);

        if ($request->hasFile('thumbnail')) {
            $course->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
            $course->save();
        }

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }
     public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
    
}
 