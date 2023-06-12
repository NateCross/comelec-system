<?php

namespace App\Http\Controllers;

use App\Helpers\RecordStudentHelper;
use App\Models\Candidate;
use App\Models\ElectionRecord;
use App\Models\RecordCandidate;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ElectionRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'frontend.election-manager.index',
            [
                'elections' =>
                ElectionRecord::query()->paginate(10),
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.election-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'status' => [
                    Rule::in(['Active', 'Canceled', 'Final', 'Archived']),
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
            $validated['status'] = [
                'Active' => 'a',
                'Canceled' => 'c',
                'Final' => 'f',
                'Archived' => 'r',
            ][$validated['status']];

            $electionRecord = ElectionRecord::create($validated);
            $electionId = $electionRecord->id;

            $students = Student::query()
                ->whereKeyNot('0000')
                ->get();
            if (isset($students)) {
                foreach ($students as $student) {
                    RecordStudentHelper::createRecordStudent(
                        $electionId,
                        $student->student_id,
                    );
                }
            }

            $candidates = Candidate::query()
                ->where('is_archived', false)
                ->get();
            if (isset($candidates)) {
                $candidates = $candidates->map(fn ($item, $key) => ([
                    'election_id' => $electionId,
                    'candidate_id' => $item->id,
                    'is_elected' => false,
                    'num_of_votes' => 0,
                    'reason' => '',
                ]))->toArray();
                RecordCandidate::insert($candidates);
            }

            return redirect()->intended('election');
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionRecord $electionRecord)
    {
        try {
            return $electionRecord;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
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
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionRecord $electionRecord)
    {
        try {
            $electionRecord->delete();

            return response()->json([
                'message' => 'Election Record successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function search(Request $request) {
        try {
            $validated = $request->validate([
                'query' => [
                    'string',
                    'required',
                ],
            ]);
            $query = $validated['query'];
            return view(
                'frontend.election-manager.index',
                [
                    'elections' =>
                    ElectionRecord::query()
                        ->where('name', 'LIKE', "%$query%")
                        ->paginate(10),
                ],
            );
        } catch (\Exception $e) {
            return redirect()->route('election.index');
        }
    }
}
