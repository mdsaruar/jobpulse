<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index()
    {
        $UserId = auth()->user()->id;
        $skills = Skill::orderBy('id', 'desc')->where('user_id', $UserId)->get();
        return view('backend.pages.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.pages.skill.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50|unique:skills',

            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $UserId = auth()->user()->id;


            Skill::create([
                'user_id' => $UserId,
                'name' => $request->input('name'),
            ]);
            return redirect()->route('skill.index')->with('success', 'Skill created successfully.');

        } catch (Exception $e) {

            return redirect()
            ->route('skill.create')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Skill creation failed. ' . $e->getMessage());


        }
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('backend.pages.skill.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        try {


            $skill = Skill::findOrFail($id);

            if ($skill->name == $request->input('name')) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',

                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50|unique:skills',

                ]);
            }

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $skill->update([
                'name' => $request->input('name'),
            ]);
            return redirect()->route('skill.index')->with('success', 'Skill updated successfully.');

        } catch (Exception $e) {
            return redirect()
            ->route('skill.edit', $id)
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Skill update failed. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();
            return redirect()->route('skill.index')->with('success', 'Skill Deleted successfully.');

        } catch (Exception $e) {
            return redirect()->route('skill.index')->with('error', 'Skill Deleted failed.'.$e->getMessage());
        }
    }
}
