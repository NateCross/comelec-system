<?php

namespace App\Http\Controllers;

use App\Helpers\ElectionHelper;
use App\Helpers\RecordStudentHelper;
use App\Models\Candidate;
use App\Models\ElectionRecord;
use App\Models\RecordCandidate;
use App\Models\RecordStudent;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
                    'nullable',
                ],
                'filter' => [
                    Rule::in(['c', 'r', 'f']),
                    'nullable',
                ],
            ]);

            $query = $validated['query'] ?? null;
            $filter = $validated['filter'] ?? null;

            $builder = ElectionRecord::query();

            if (isset($query)) {
                $builder->where('name', 'LIKE', "%$query%");
            } 
            if (isset($filter)) {
                $builder->where('status', '=', $filter);
            }

            $result = $builder
                ->orderBy('start_time', 'desc')
                ->paginate(10)
                ->appends([
                    'query' => $query,
                    'filter' => $filter,
                ]);

            return view(
                'frontend.election-manager.index',
                [
                    'elections' => $result,
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

    public function apiGetActiveElection() {
        return ElectionHelper::getActiveElection();
    }

    public function apiHandleAccessCode(Request $request) {
        try {
            $user = $request->user();

            $validated = $request->validate([
                'access_code' => [
                    'required',
                    'string',
                    'max:6',
                ],
                'election_id' => [
                    'required',
                    'exists:election_records,id',
                ],
            ]);

            $accessCode = $validated['access_code'];
            $electionId = $validated['election_id'];

            $recordStudent = RecordStudent::query()
                ->where('student_id', $user?->student_id)
                ->where('election_id', $electionId)
                ->where('access_code', $accessCode)
                ->first();

            if (!isset($recordStudent)) {
                return response([
                    'error' => 'Incorrect access code.',
                ], 403);
            }

            return $recordStudent;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response([
                'error' => $e->getMessage(),
            ], 403);
        }
    }

    public function apiVote(Request $request) {
        try {
            $user = $request->user();
            $student = $user->student;
            $activeElection = ElectionHelper::getActiveElection();

            $votes = $request->votes;

            $voteCode = "";
            foreach ($activeElection->candidates as $candidate) {
                if ($votes[$candidate->id]) {
                    $voteCode = $voteCode . "1";
                } else {
                    $voteCode = $voteCode . "0";
                }
            }
            // return $voteCode;
            // $activeElection->candidates->each(function ($item, $key) {
            // });
            // return $votes[7];

            // $validated = $request->validate([
            //     'vote_code' => [
            //         'string',
            //         'required',
            //     ],
            // ]);

            // $voteCode = $validated['vote_code'];

            $recordStudent = RecordStudent::query()
                ->where('election_id', $activeElection->id)
                ->where('student_id', $student->student_id);

            $decimalVoteCode = bindec($voteCode);
            
            $recordStudent->update([
                'vote_code' => $decimalVoteCode,
                'vote_timestamp' => Carbon::now(),
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
            ], 403);
        }
    }

    public function processVoteCode() {
        return ElectionHelper::decToBinVoteCode(5);
    }

    public function countVotes() {
        $activeElection = ElectionHelper::getActiveElection();
        return ElectionHelper::countVotes($activeElection);
    }
}
