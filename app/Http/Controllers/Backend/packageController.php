<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class packageController extends Controller
{
    public function show()
    {
        return view('backend.pages.packages');
    }
     public function create()
    {
        return view('backend.pages.package_create');
    }
}
