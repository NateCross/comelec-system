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
        return view(
            'frontend.permitted-networks.index',
            [
                'networks' =>
                    PermittedNetwork::query()
                        ->latest()
                        ->paginate(10),
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view (
            'frontend.permitted-networks.create',
        );
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

        return redirect()->route('networks.index');
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
        return view(
            'frontend.permitted-networks.edit',
            [
                'network' => $permittedNetwork,
            ],
        );
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

        return redirect()->route('networks.index');
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

    public function search(Request $request) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);

        $query = $validated['query'] ?? null;

        if (!isset($query))
            return redirect()->route('networks.index');

        $builder = PermittedNetwork::query();
        $builder->where('name', 'LIKE', "%$query%");
        $builder->latest();
        $result = $builder->paginate(10);
        
        return view(
            'frontend.permitted-networks.index',
            [
                'networks' => $result,
            ],
        );
    }
}
