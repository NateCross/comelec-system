<?php

namespace App\Http\Controllers;

use App\Models\RecordCandidate;
use Illuminate\Http\Request;

class RecordCandidateController extends Controller
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
        try {
            $validated = $request->validate([
                'election_id' => [
                    'integer',
                    'exists:election_records,id',
                    'required',
                ],
                'candidate_id' => [
                    'integer',
                    'exists:candidates,id',
                    'required',
                ],
                'is_elected' => [
                    'boolean',
                    'required',
                ],
                'num_of_votes' => [
                    'integer',
                    'required',
                ],
                'reason' => [
                    'max:50',
                    'string',
                    'required',
                ],
            ]);

            RecordCandidate::create($validated);

            return response()->json([
                'message' => 'Record-Candidate successfully created',
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
    public function show(RecordCandidate $recordCandidate)
    {
        try {
            return $recordCandidate;
            // return RecordCandidate::where('id', 1)->first();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecordCandidate $recordCandidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecordCandidate $recordCandidate)
    {
        try {
            $validated = $request->validate([
                'election_id' => [
                    'integer',
                    'exists:election_records,id',
                ],
                'candidate_id' => [
                    'integer',
                    'exists:candidates,id',
                ],
                'is_elected' => [
                    'boolean',
                ],
                'num_of_votes' => [
                    'integer',
                ],
                'reason' => [
                    'max:50',
                    'string',
                ],
            ]);

            $recordCandidate->update($validated);

            return response()->json([
                'message' => 'Record-Candidate successfully updated',
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
    public function destroy(RecordCandidate $recordCandidate)
    {
        try {
            $recordCandidate->delete();

            return response()->json([
                'message' => 'Record-Candidate successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
