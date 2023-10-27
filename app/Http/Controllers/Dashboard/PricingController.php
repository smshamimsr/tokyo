<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Pricing;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePricingRequest;
use App\Http\Requests\Dashboard\UpdatePricingRequest;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price = Pricing::latest()->get();
        return view('dashboard.pages.price.index', compact('price'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.price.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePricingRequest $request)
    {

        $data = [
            'title' => strtolower($request->title),
            'price' => $request->price,
            'description' => $request->description,
        ];
        Pricing::create($data);

        return to_route('prices.index')->with([
            'message' => 'Price added successfully.',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('dashboard.pages.price.show', compact('pricing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('dashboard.pages.price.edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePricingRequest $request,  $id)
    {
        $pricing = Pricing::findOrFail($id);
        $data = [
            'title' => strtolower($request->title),
            'price' => $request->price,
            'description' => $request->description,
        ];
        $pricing->update($data);

        return to_route('prices.index')->with([
            'message' => 'Price updated successfully.',
            'class' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        return redirect()->back()->with([
            'message' => 'Price deleted successfully.',
            'class' => 'warning',
        ]);
    }
}
