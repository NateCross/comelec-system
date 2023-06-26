<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isNull;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'frontend.positions-list.index',
            [
                'positions' =>
                Position::query()
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
        return view('frontend.positions-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                Rule::in('on'),
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
        if (isset($validated['is_for_all']))
            $validated['is_for_all'] = true;

        Position::create($validated);

        return redirect()->route('positions.index');
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
        return view(
            'frontend.positions-list.edit',
            [
                'position' => $position,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'position_name' => [
                'max:50',
                'string',
            ],
            'description' => [
                'max:255',
                'string',
                'nullable',
            ],
            'is_for_all' => [
                Rule::in('on'),
            ],
            'college' => [
                'max:50',
                'string',
                'nullable',
            ],
            'num_of_elects' => [
                'integer',
            ],
        ]);

        if (isset($validated['is_for_all']))
            $validated['is_for_all'] = true;
        else
            $validated['is_for_all'] = false;
        
        $position->update($validated);

        return redirect()->route('positions.index');
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

    public function search(request $request)
    {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);
        $query = $validated['query'];
        if (!$query) 
            return redirect()->route('positions.index');
        return view(
            'frontend.positions-list.index',
            [
                'positions' =>
                Position::query()
                    ->where('position_name', 'LIKE', "%$query%")
                    ->paginate(10)
                    ->appends([
                        'query' => $query,
                    ]),
            ],
        );
    }
}
