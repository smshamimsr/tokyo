<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\Helper;
use App\Models\Dashboard\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreClientRequest;
use App\Http\Requests\Dashboard\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::latest()->get();
        return view('dashboard.pages.client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->all();
        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $data['photo'] = strtolower(str_replace(' ', '-', $request->name)) . '.webp';
            Helper::imageUpload($photo, Client::WIDTH, Client::HEIGHT, Client::PATH, $data['photo']);
        }

        Client::create($data);

        return to_route('partners.index')->with([
            'message' => 'pertners added success',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('dashboard.pages.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $data = $request->all();
        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $data['photo'] = strtolower(str_replace(' ', '-', $request->name)) . '.webp';

            if ($client->photo != null) {
                Helper::unlinkImage(Client::PATH, $client->photo);
            }
            Helper::imageUpload($photo, Client::WIDTH, Client::HEIGHT, Client::PATH, $data['photo']);
        }

        $client->update($data);

        return to_route('partners.index')->with([
            'message' => 'pertners updated success',
            'class' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client->photo != null) {
            Helper::unlinkImage(Client::PATH, $client->photo);
        }
        $client->delete();

        return redirect()->back()->with([
            'message' => 'pertners deleted success',
            'class' => 'warning',
        ]);
    }
}
