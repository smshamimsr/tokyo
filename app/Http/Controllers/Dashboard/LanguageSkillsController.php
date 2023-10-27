<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\LanguageSkills;
use App\Http\Requests\Dashboard\StoreLanguageSkillsRequest;
use App\Http\Requests\Dashboard\UpdateLanguageSkillsRequest;

class LanguageSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languageSkills = LanguageSkills::latest()->get();
        return view('dashboard.pages.languageSkill.index', compact('languageSkills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.languageSkill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageSkillsRequest $request)
    {
        $data = [
            'name' => strtolower($request->name),
            'value' => $request->value,
            'status' => $request->status,
        ];
        LanguageSkills::create($data);

        return to_route('language-skills.index')->with([
            'message' => 'language skill added success',
            'class' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LanguageSkills $languageSkills)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LanguageSkills $languageSkills)
    {
        return $languageSkills;
        return view('dashboard.pages.languageSkill.edit', compact('languageSkills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageSkillsRequest $request, LanguageSkills $languageSkills)
    {
        $data = [
            'name' => strtolower($request->name),
            'value' => $request->value,
            'status' => $request->status,
        ];
        $languageSkills->update($data);

        return to_route('language-skills.index')->with([
            'message' => 'language skill updated success',
            'class' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LanguageSkills $languageSkills)
    {
        $languageSkills->delete();

        return redirect()->back()->with([
            'message' => 'language skill deleted success',
            'class' => 'warning'
        ]);
    }
}
