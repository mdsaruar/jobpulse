<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Support\Facades\Validator;

class JobTypeController extends Controller
{
    public function index()
    {
        $UserId = auth()->user()->id;
        $Jobtypes = JobType::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        return view('backend.pages.job_type.index', compact('Jobtypes'));
    }

    public function create()
    {
        return view('backend.pages.job_type.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50|unique:job_types,name',

            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $UserId = auth()->user()->id;

           // dd($request->all());

            JobType::create([
                'user_id' => $UserId,
                'name' => $request->input('name'),
            ]);
            return redirect()->route('JobType.index')->with('success', 'Job Type created successfully.');

        } catch (Exception $e) {

            return redirect()
            ->route('JobType.create')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Job Type creation failed. ' . $e->getMessage());


        }
    }

    public function edit($id)
    {
        $Jobtype = JobType::findOrFail($id);
        return view('backend.pages.job_type.edit', compact('Jobtype'));
    }

    public function update(Request $request, $id)
    {
        try {


            $Jobtype = JobType::findOrFail($id);

            if ($Jobtype->name == $request->input('name')) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',

                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50|unique:categories',

                ]);
            }

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $Jobtype->update([
                'name' => $request->input('name'),
            ]);
            return redirect()->route('JobType.index')->with('success', 'Job Type updated successfully.');

        } catch (Exception $e) {
            return redirect()
            ->route('JobType.edit', $id)
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Job Type update failed. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $Jobtype = JobType::findOrFail($id);
            $Jobtype->delete();
            return redirect()->route('JobType.index')->with('success', 'Job Type deleted successfully.');

        } catch (Exception $e) {
            return redirect()->route('JobType.index')->with('error', 'Job Type deleted failed.');
        }
    }
}
