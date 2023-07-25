<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PrototypeController extends Controller
{
    public function show()
    {
        return view('prototype.file');
    }

    public function index()
    {
        $news = News::all();

        return view('prototype.file', compact('news'));
    }
}
