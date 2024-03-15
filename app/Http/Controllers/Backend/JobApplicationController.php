<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class JobApplicationController extends Controller
{

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user has the "superadmin" role
        if ($user->hasRole('superadmin')) {
            // If the user is a superadmin, get all jobs
            $JobApplications = JobApplication::orderBy('id', 'desc')->with('job', 'user','company')->get();
        } else {
            // If the user is not a superadmin, get jobs based on user_id
            $JobApplications = JobApplication::orderBy('id', 'desc')
                ->where('company_id', $user->id)
                ->with('job', 'user')
                ->with('company', 'user')
                ->get();
        }

        return view('backend.pages.job_application.index', compact('JobApplications'));
    }
   public function update(Request $request, $id)
    {
        $JobApplication = JobApplication::find($id);
        $JobApplication->status = $request->status;
        $JobApplication->save();
        return redirect()->back()->with('success', 'Job Application status updated successfully');
    }

}
