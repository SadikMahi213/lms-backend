<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the student dashboard.
     */
    public function dashboard()
    {
        return view('student.dashboard');
    }

    /**
     * Show my courses page.
     */
    public function myCourses()
    {
        return view('student.my-courses');
    }

    /**
     * Show the library page.
     */
    public function library()
    {
        return view('student.library');
    }

    /**
     * Show the exam portal (general).
     */
    public function examPortalGeneral()
    {
        return view('student.exam-portal-general');
    }

    /**
     * Show the exam portal (batch).
     */
    public function examPortalBatch()
    {
        return view('student.exam-portal-batch');
    }

    /**
     * Show the exam status page.
     */
    public function examStatus()
    {
        return view('student.exam-status');
    }

    /**
     * Show the message inbox.
     */
    public function messageInbox()
    {
        return view('student.message-inbox');
    }

    /**
     * Show the shopping cart.
     */
    public function cart()
    {
        return view('student.add-to-cart');
    }
}
