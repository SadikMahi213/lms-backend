<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\User;
use App\Models\Course;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        $total_payments = Payment::sum('amount'); // payments table এর total
        $total_students = User::where('role', 'student')->count();
        $total_teachers = User::where('role', 'teacher')->count();
        $total_courses = Course::count();

        return view('admin.dashboard', compact(
            'total_payments',
            'total_students',
            'total_teachers',
            'total_courses'
        ));
    }

    /**
     * Show the notice board.
     */
    public function noticeBoard()
    {
        return view('admin.notice-board');
    }

    /**
     * Show the payments page.
     */
    public function payments()
    {
         // Example: fetch payments, courses, students
    $payments = \App\Models\Payment::all(); 
    $courses = \App\Models\Course::all();
    $students = User::where('role', 'student')->get();
    $total_payments = $payments->count();
    $total_revenue = $payments->sum('amount');
     $course_id = $courses->first()?->id ?? null;
     $course_title = $courses->first()?->title ?? 'No Course Found';

    // Pass any variables you need in Blade
    return view('admin.payments', compact('payments', 'courses', 'students','total_payments', 'total_revenue','course_id','course_title' ));
    }

    /**
     * Show the portfolio page.
     */
    public function portfolio()
    {
        return view('admin.portfolio');
    }
}
