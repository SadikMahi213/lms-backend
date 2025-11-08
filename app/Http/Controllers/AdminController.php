<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\User;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Exam;
use App\Models\Student;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
         $students = Student::orderBy('created_at', 'desc')->get();
        $total_payments = Payment::sum('amount'); // payments table এর total
        $total_students = User::where('role', 'student')->count();
        $total_teachers = User::where('role', 'teacher')->count();
        $total_courses = Course::count();

        return view('admin.dashboard', compact(
            'total_payments',
            'total_students',
            'total_teachers',
            'students',
            'total_courses'
        ));
    }

    /**
     * Show the notice board.
     */
    public function noticeBoard()
    {
        $notices = Notice::all(); 
        $total_notices = Notice::count();
        $recent_notice = Notice::latest()->first();
        $recent_notice_title = Notice::latest()->first()->title ?? 'No recent notice';
        $recent_notice_date = $recent_notice->created_at ?? 'N/A';
        $notice_title = $recent_notice->title ?? 'No notices yet';
    $notice_content = $recent_notice->content ?? 'N/A';
    $notice_date = $recent_notice->created_at ?? 'N/A';
    return view('admin.notice-board', compact('notices','total_notices','recent_notice_title','recent_notice_date','notice_title','notice_content','notice_date'));
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
    $total_students = User::where('role', 'student')->count();
    $total_courses = Course::count();

    // Top courses by students
    $top_course_1 = Course::withCount('students')->orderBy('students_count', 'desc')->first();
    $top_course_1_teacher = $top_course_1?->teachers()->first();
    $top_course_1_count = $top_course_1->students_count ?? 0;

    $top_course_2 = Course::withCount('students')->orderBy('students_count', 'desc')->skip(1)->first();
    $top_course_2_teacher = $top_course_2?->teachers()->first();

    // Course with most teachers
    $courseWithMostTeachers = Course::withCount('teachers')
                                    ->orderBy('teachers_count', 'desc')
                                    ->first();

    // Monthly revenue
    $monthly_revenue = Payment::whereMonth('created_at', now()->month)->sum('amount');
    $last_month_revenue = Payment::whereMonth('created_at', now()->subMonth()->month)->sum('amount');
    $revenue_change = $monthly_revenue - $last_month_revenue;

    // Exams
    $total_exams = Exam::count();
    $passed_exams = Exam::where('status', 'pass')->count();
    $exam_pass_rate = $total_exams ? round(($passed_exams / $total_exams) * 100, 2) : 0;

    // All courses with students & teachers count
    $courses = Course::withCount(['students', 'teachers'])->get();
    $top_course_3 = Course::withCount('students')->orderBy('students_count', 'desc')->skip(2)->first();
$top_course_3_teacher = $top_course_3?->teachers()->first();
$top_course_3_count = $top_course_3?->students_count ?? 0;



    return view('admin.portfolio', compact(
        'total_students',
        'total_courses',
        'top_course_1',
        'top_course_1_teacher',
        'top_course_1_count',
        'top_course_2',
        'top_course_2_teacher',
        'courseWithMostTeachers',
        'monthly_revenue',
        'last_month_revenue',
        'revenue_change',
        'total_exams',
        'passed_exams',
        'exam_pass_rate',
        'courses',
        'top_course_3',
        'top_course_3_teacher',
        'top_course_3_count'
    ));
}



}
