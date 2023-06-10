<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Position::with('candidates')->get();
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
        try {
            $validated = $request->validate([
                'position_name' => [
                    'max:50',
                    'string',
                    'required',
                ],
                'description' => [
                    'max:255',
                    'string',
                    'nullable',
                ],
                'is_for_all' => [
                    'boolean',
                    'nullable',
                ],
                'college' => [
                    'max:50',
                    'string',
                    'nullable',
                ],
                'num_of_elects' => [
                    'integer',
                    'required',
                ],
            ]);

            Position::create($validated);

            return response()->json([
                'message' => 'Position successfully created',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        try {
            return $position;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        try {
            $validated = $request->validate([
                'position_name' => [
                    'max:50',
                    'string',
                ],
                'description' => [
                    'max:255',
                    'string',
                ],
                'is_for_all' => [
                    'boolean',
                ],
                'college' => [
                    'max:50',
                    'string',
                ],
                'num_of_elects' => [
                    'integer',
                ],
            ]);

            $position->update($validated);

            return response()->json([
                'message' => 'Position successfully updated',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        try {
            $position->delete();

            return response()->json([
                'message' => 'Position successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
