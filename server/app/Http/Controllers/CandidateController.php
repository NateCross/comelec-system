<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Candidate::with('student')->with('position')->with('records')->get();
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
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                    'required',
                ],
                'position_id' => [
                    'integer',
                    'exists:positions,id',
                    'required',
                ],
                'party_name' => [
                    'max:50',
                    'string',
                    'nullable',
                ],
                'image' => [
                    'file',
                    'nullable',
                ],
                'is_archived' => [
                    'boolean',
                    'nullable',
                ],
            ]);

            if (isset($validated['image'])) {
                $image = $validated['image'];
                $path = $image->store('public/candidates');
                $path = substr($path, strpos($path, '/') + 1);
                $validated['image_url'] = $path;
                unset($validated['image']);
            }

            Candidate::create($validated);

            return response()->json([
                'message' => 'Candidate successfully created',
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
    public function show(Candidate $candidate)
    {
        try {
            return $candidate;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        try {
            $validated = $request->validate([
                'position_id' => [
                    'integer',
                    'exists:positions,id',
                ],
                'party_name' => [
                    'max:50',
                    'string',
                ],
                'image' => [
                    'file',
                ],
                'is_archived' => [
                    'boolean',
                ],
            ]);


            if (isset($validated['image'])) {
                $image = $validated['image'];
                if ($originalImagePath = $candidate->image_url) {
                    Storage::delete('public/'.$originalImagePath);
                }
                $path = $image->store('public/candidates');
                $path = substr($path, strpos($path, '/') + 1);
                $validated['image_url'] = $path;
                unset($validated['image']);
            }

            $candidate->update($validated);

            return response()->json([
                'message' => 'Candidate successfully updated',
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
    public function destroy(Candidate $candidate)
    {
        try {
            if ($image = $candidate->image_url) {
                Storage::delete('public/'.$image);
            }
            $candidate->delete();

            return response()->json([
                'message' => 'Candidate successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function destroyAll() {
        try {
            Candidate::query()->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function archiveAll() {
        try {
            Candidate::query()
                ->where('is_archived', false)
                ->update(['is_archived' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
