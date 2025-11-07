<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Show the teacher dashboard.
     */
    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    /**
     * Show the upload course page.
     */
    public function uploadCourse()
    {
        return view('teacher.upload-course');
    }

    /**
     * Show the exam creation page.
     */
    public function examCreation()
    {
        return view('teacher.exam-creation');
    }

    /**
     * Show the annotation page.
     */
    public function annotation()
    {
        return view('teacher.annotation');
    }

    /**
     * Show the message inbox.
     */
    public function messageInbox()
    {
        return view('teacher.message-inbox');
    }
}
