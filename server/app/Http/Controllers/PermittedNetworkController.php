<?php

namespace App\Http\Controllers;

use App\Models\PermittedNetwork;
use Illuminate\Http\Request;

class PermittedNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'string',
                'required',
            ],
        ]);

        PermittedNetwork::create($validated);

        return redirect()->route('network.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PermittedNetwork $permittedNetwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermittedNetwork $permittedNetwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermittedNetwork $permittedNetwork)
    {
        $validated = $request->validate([
            'name' => [
                'string',
            ],
        ]);

        $permittedNetwork->updateOrFail($validated);

        return redirect()->route('network.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermittedNetwork $permittedNetwork)
    {
        $permittedNetwork->delete();

        return response()->json([
            'message' => 'Network successfully deleted',
        ]);
    }
}
