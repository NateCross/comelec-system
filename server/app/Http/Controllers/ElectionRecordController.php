<?php

namespace App\Http\Controllers;

use App\Models\ElectionRecord;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ElectionRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ElectionRecord::with('students')->with('candidates')->get();
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
            'status' => [
                Rule::in(['a', 'c', 'f', 'r']),
                'required',
            ],
            'name' => [
                'string',
                'max:100',
                'required',
            ],
            'description' => [
                'string',
                'max:255',
                'nullable',
            ],
            'start_time' => [
                'date',
                'required',
            ],
            'end_time' => [
                'date',
                'required',
            ],
        ]);

        ElectionRecord::create($validated);

        return response()->json([
            'message' => 'Election Record successfully created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionRecord $electionRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionRecord $electionRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionRecord $electionRecord)
    {
        $validated = $request->validate([
            'status' => [
                Rule::in(['a', 'c', 'f', 'r']),
            ],
            'name' => [
                'string',
                'max:100',
            ],
            'description' => [
                'string',
                'max:255',
                'nullable',
            ],
            'start_time' => [
                'date',
            ],
            'end_time' => [
                'date',
            ],
        ]);

        $electionRecord->update($validated);

        return response()->json([
            'message' => 'Election Record successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionRecord $electionRecord)
    {
        //
    }
}
