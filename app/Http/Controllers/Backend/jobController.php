<?php

namespace App\Http\Controllers\Backend;
use Exception;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Skill;
use App\Models\JobType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class jobController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user has the "superadmin" role
        if ($user->hasRole('superadmin')) {
            // If the user is a superadmin, get all jobs
            $jobs = Job::orderBy('id', 'desc')->with('category', 'skills')->get();
        } else {
            // If the user is not a superadmin, get jobs based on user_id
            $jobs = Job::orderBy('id', 'desc')
                ->where('user_id', $user->id)
                ->with('category', 'skills')
                ->get();
        }

        return view('backend.pages.job.index', compact('jobs'));
    }

    public function create()
    {
        $UserId = auth()->user()->id;
        $categories = Category::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        $jobtypes = JobType::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        $skills = Skill::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        return view('backend.pages.job.create', compact('categories', 'skills', 'jobtypes'));
    }

    public function store(Request $request)
    {
        try {
            //dd($request->all());
            $validator = Validator::make($request->all(), [
                'category_id' => 'required|numeric',
                'title' => 'required|string|max:50',
                'job_type' => 'required',
                'vacancy' => 'required|numeric',
                'salary' => 'required|numeric',
                'dateline' => 'required|date',
                'content_details' => 'required|string',
                'benefits' => 'string',
                'responsibility' => 'string',
                'qualifications' => 'string',
                'Keywords' => 'nullable|string',
                'skills' => 'nullable|array', // Validation for skills array
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $dateline = $request->input('dateline');
            $formattedDateline = Carbon::createFromFormat('m/d/Y', $dateline)->format('Y-m-d');

            $UserId = auth()->user()->id;

            //dd($request->all());
            $job = Job::create([
                'user_id' => $UserId,
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'job_type_id' => $request->input('job_type'),
                'vacancy' => $request->input('vacancy'),
                'salary' => $request->input('salary'),
                'location' => $request->input('location'),
                'dateline' => $formattedDateline,
                'description' => $request->input('content_details'),
                'benefits' => $request->input('benefits'),
                'responsibility' => $request->input('responsibility'),
                'qualifications' => $request->input('qualifications'),
                'Keywords' => $request->input('Keywords'),
                'home_slider' => $request->input('slider'),
                'status' => $request->input('status'),
            ]);

            // Attach skills to the job
            $skills = $request->input('skills', []);
            $job->skills()->sync($skills);

            return redirect()->route('job.index')->with('success', 'Job created successfully.');
        } catch (Exception $e) {
            return redirect()
                ->route('job.create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Job creation failed. ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $UserId = auth()->user()->id;
        $categories = Category::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        $jobtypes = JobType::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        $skills = Skill::where('user_id', $UserId)->get();

        $job = Job::findOrFail($id)
            ->where('user_id', $UserId)

            ->with('category', 'skills')
            ->first();
        return view('backend.pages.job.edit', compact('job', 'categories', 'skills'));
    }

    public function update(Request $request, $id)
    {
        try {
            $job = Job::findOrFail($id);

            if ($job->name == $request->input('name')) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string',
                ]);
            }

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $job->update([
                'name' => $request->input('name'),
            ]);
            return redirect()->route('job.index')->with('success', 'Job updated successfully.');
        } catch (Exception $e) {
            return redirect()
                ->route('job.edit', $id)
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Job update failed. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $job = Job::findOrFail($id)
                ->where('user_id', auth()->user()->id)
                ->first();
            $job->delete();
            return redirect()->route('job.index')->with('success', 'Job Deleted successfully.');
        } catch (Exception $e) {
            return redirect()
                ->route('job.index')
                ->with('error', 'Job Deleted failed.' . $e->getMessage());
        }
    }
}
