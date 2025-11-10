<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function enroll(Course $course)
    {
        $user = Auth::user();

        // Check if already enrolled
        if ($user->enrolledCourses()->where('course_id', $course->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Already enrolled in this course.'
            ]);
        }

        // Attach to pivot table
        $user->enrolledCourses()->attach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Course added successfully!'
        ]);
    }
}
