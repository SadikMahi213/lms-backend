<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
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
        return view('admin.payments');
    }

    /**
     * Show the portfolio page.
     */
    public function portfolio()
    {
        return view('admin.portfolio');
    }
}
