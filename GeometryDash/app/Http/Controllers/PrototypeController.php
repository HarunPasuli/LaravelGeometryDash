<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrototypeController extends Controller
{
    public function show()
    {
        return view('prototype.file');
    }
}
