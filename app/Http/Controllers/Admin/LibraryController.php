<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::all();
         return view('admin.library', compact('libraries'));
    }

    public function create()
    {
        return view('admin.library-create'); // Blade file for creating resource
    }

    public function store(Request $request)
    {
        // validation and saving logic
    }

    public function edit($id)
    {
        $item = Library::findOrFail($id);
        return view('admin.library-edit', compact('item'));
    }
}
