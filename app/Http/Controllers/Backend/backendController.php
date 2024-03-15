<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class backendController extends Controller
{
   public function index()
   {
    $company = User::role('company')->where('status','enabled')->count();
    $companyInactive = User::role('company')->where('status','disabled')->count();
    $job = Job::where('status',1)->count();
    $jobApplicant = JobApplication::count();
    return view('backend.pages.home',compact('company','companyInactive','job','jobApplicant'));
   }

}
