<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Interests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreInterestsRequest;
use App\Http\Requests\Dashboard\UpdateInterestsRequest;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $interests = Interests::latest()->get();
        return view('dashboard.pages.interests.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.interests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInterestsRequest $request)
    {
        Interests::create($request->only('name', 'status'));

        return to_route('interests.index')->with([
            'message' => 'interests added success',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Interests $interests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $interests = Interests::findOrFail($id);
        return view('dashboard.pages.interests.edit', compact('interests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterestsRequest $request,  $id)
    {
        $interests = Interests::findOrFail($id);
        $interests->update($request->only('name', 'status'));

        return to_route('interests.index')->with([
            'message' => 'interests updated success',
            'class' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $interests = Interests::findOrFail($id);
        $interests->delete();
        return redirect()->back()->with([
            'message' => 'interests delete success',
            'class' => 'warning',
        ]);
    }
}
