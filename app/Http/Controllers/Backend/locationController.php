<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class locationController extends Controller
{
    public function show()
    {
        return view('backend.pages.locations');
    }
     public function create()
    {
        return view('backend.pages.location_create');
    }
}
