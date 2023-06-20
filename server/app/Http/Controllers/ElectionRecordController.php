<?php

namespace App\Http\Controllers;

use App\Helpers\RecordStudentHelper;
use App\Models\Candidate;
use App\Models\ElectionRecord;
use App\Models\RecordCandidate;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                ElectionRecord::query()
                    ->orderBy('start_time', 'desc')
                    ->paginate(10),
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
                ->where('is_enrolled', true)
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

    public function voters(ElectionRecord $electionRecord) {
        return view(
            'frontend.election-voters.index',
            [
                'election' => ElectionRecord::query()
                    ->whereKey($electionRecord->id)
                    ->with('validStudents')
                    ->first(),
            ]
        );
    }

    public function votersSearch(Request $request, ElectionRecord $electionRecord) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);
        $query = $validated['query'];
        if (!$query)
            return redirect()->route('election.voters', $electionRecord->id);

        $results = ElectionRecord::query()
            ->whereKey($electionRecord->id)
            ->with('validStudents')
            ->first();

        $resultsCandidate = $results->validStudents
            ->toQuery()
            ->where('full_name', 'LIKE', "%$query%")
            ->get();

        $results->validStudents = $results->validStudents->intersect($resultsCandidate);

        return view(
            'frontend.election-voters.index',
            [
                'election' => $results,
            ],
        );
    }

    public function candidates(ElectionRecord $electionRecord) {
        return view (
            'frontend.election-candidates.index',
            [
                'election' => ElectionRecord::query()
                    ->whereKey($electionRecord->id)
                    ->with('candidates')
                    ->with('candidates.student')
                    ->first(),
            ]
        );
    }

    public function candidatesEdit(ElectionRecord $electionRecord, Candidate $candidate) {
        if ($electionRecord->status !== 'a')
            return redirect()->back();
        
        $recordCandidate = RecordCandidate::query()
            ->where('election_id', $electionRecord->id)
            ->where('candidate_id', $candidate->id)
            ->first();
        return view(
            'frontend.election-candidates.edit',
            [
                'record_candidate' => $recordCandidate,
            ]
        );
    }

    public function candidatesSearch(Request $request, ElectionRecord $electionRecord) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
        ]);
        $query = $validated['query'];
        if (!$query)
            return redirect()->route('election.candidates', $electionRecord->id);

        $results = ElectionRecord::query()
            ->whereKey($electionRecord->id)
            ->with('candidates')
            ->with('candidates.student')
            ->first();

        $resultsCandidate = $results->candidates
            ->toQuery()
            ->with('student')
            ->whereRelation('student', 'full_name', 'LIKE', "%$query%")
            ->get();
        
        $results->candidates = $results->candidates->intersect($resultsCandidate);

        return view(
            'frontend.election-candidates.index',
            [
                'election' => $results,
            ],
        );
    }
}
