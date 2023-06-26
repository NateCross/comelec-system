<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'frontend.candidates-list.index',
            [
                'candidates' => 
                Candidate::query()
                    ->whereNot('is_archived', true)
                    ->with('student')
                    ->with('position')
                    ->latest()
                    ->paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'frontend.candidates-list.create',
            [
                'positions' =>
                Position::all(),
            ],
        );
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
                ],
                'is_archived' => [
                    'boolean',
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
        } catch (\Exception $e) {
            return back()->withErrors([
                'validation' => $e->getMessage(),
            ]);
        }

        return redirect()->route('candidates.index');
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
        return view(
            'frontend.candidates-list.edit',
            [
                'candidate' => Candidate::query()
                    ->whereKey($candidate->id)
                    ->with('student')
                    ->with('position')
                    ->first(),
                'positions' =>
                Position::all(),
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'position_id' => [
                'integer',
                'exists:positions,id',
            ],
            'party_name' => [
                'max:50',
                'string',
                'nullable',
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

        return redirect()->route('candidates.index');
    }

    /**
     * Archives the given candidate
     */
    public function destroy(Candidate $candidate)
    {
        try {
            $candidate->is_archived = !$candidate->is_archived;
            $candidate->save();

            return response()->json([
                'message' => 'Candidate successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * This function actually deletes. The other
     */
    public function delete(Candidate $candidate)
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
            return response()->json([
                'message' => 'Archived all',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function archive() {
        return view(
            'frontend.archived-candidates.index',
            [
                'candidates' =>
                Candidate::query()
                    ->where('is_archived', true)
                    ->with('student')
                    ->with('position')
                    ->with('records')
                    ->latest()
                    ->paginate(10),
            ],
        );
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);
        $query = $validated['query'];
        if (!$query) 
            return redirect()->route('candidates.index');
        return view(
            'frontend.candidates-list.index',
            [
                'candidates' =>
                Candidate::query()
                    ->with('student')
                    ->with('position')
                    ->whereRelation('student', 'full_name', 'LIKE', "%$query%")
                    ->where('is_archived', false)
                    ->latest()
                    ->paginate(10)
                    ->appends([
                        'query' => $query,
                    ]),
            ],
        );
    }

    public function searchArchive(Request $request) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);
        $query = $validated['query'];
        if (!$query) 
            return redirect()->route('candidates.archive');
        return view(
            'frontend.archived-candidates.index',
            [
                'candidates' =>
                Candidate::query()
                    ->with('student')
                    ->with('position')
                    ->with('records')
                    ->whereRelation('student', 'full_name', 'LIKE', "%$query%")
                    ->where('is_archived', true)
                    ->latest()
                    ->paginate(10)
                    ->appends([
                        'query' => $query,
                    ]),
            ],
        );
    }
}
