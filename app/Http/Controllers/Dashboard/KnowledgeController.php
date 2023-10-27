<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Knowledge;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreKnowledgeRequest;
use App\Http\Requests\Dashboard\UpdateKnowledgeRequest;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knowledge = Knowledge::latest()->get();
        return view('dashboard.pages.knowledge.index', compact('knowledge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.knowledge.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKnowledgeRequest $request)
    {
        Knowledge::create($request->only('name', 'status'));

        return to_route('knowledges.index')->with([
            'message' => 'knowledge added success',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knowledge $knowledge)
    {
        return view('dashboard.pages.knowledge.edit', compact('knowledge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKnowledgeRequest $request, Knowledge $knowledge)
    {
        $knowledge->update($request->only('name', 'status'));

        return to_route('knowledges.index')->with([
            'message' => 'knowledge updated success',
            'class' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();

        return redirect()->back()->with([
            'message' => 'knowledge deleted success',
            'class' => 'warning',
        ]);
    }
}
