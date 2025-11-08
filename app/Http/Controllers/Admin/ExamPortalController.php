<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ExamPortalController extends Controller
{
    public function index()
    {
        return view('admin.exam-portal'); // create this Blade view
    }
}
