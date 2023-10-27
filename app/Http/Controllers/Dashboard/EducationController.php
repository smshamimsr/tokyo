<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreEducationRequest;
use App\Http\Requests\Dashboard\UpdateEducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = Education::latest()->get();
        return view('dashboard.pages.education.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $data = [
            'session' => $request->session,
            'institute_name' => strtolower($request->institute_name),
            'degree' => $request->degree,
        ];

        Education::create($data);

        return to_route('educations.index')->with([
            'message' => 'Education added success',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('dashboard.pages.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {

        $data = [
            'session' => $request->session,
            'institute_name' => strtolower($request->institute_name),
            'degree' => $request->degree,
        ];

        $education->update($data);

        return to_route('educations.index')->with([
            'message' => 'Education updated success',
            'class' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->with([
            'message' => 'Education deleted success',
            'class' => 'warning',
        ]);
    }
}
