<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSkillRequest;
use App\Http\Requests\Dashboard\UpdateSkillRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('dashboard.pages.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        $data = [
            'name' => strtolower($request->name),
            'status' => Skill::ACTIVE,
            'value' => $request->value,
        ];
        Skill::create($data);
        return to_route('skills.index')->with([
            'message' => 'skill added success',
            'class' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('dashboard.pages.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $data = [
            'name' => strtolower($request->name),
            'status' => Skill::ACTIVE,
            'value' => $request->value,
        ];

        $skill->update($data);

        return to_route('skills.index')->with([
            'message' => 'skill updated success',
            'class' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->back()->with([
            'message' => 'skill deleted success',
            'class' => 'warning'
        ]);
    }
}
