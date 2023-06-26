<?php

namespace App\Http\Controllers;

use App\Helpers\RecordStudentHelper;
use App\Models\ElectionRecord;
use App\Models\RecordStudent;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RecordStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'frontend.access-code.index',
        );
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
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                    'required',
                ],
            ]);

            RecordStudentHelper::createRecordStudent(
                $validated['election_id'],
                $validated['student_id'],
            );

            return response()->json([
                'message' => 'Record-Student successfully created',
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
    public function show(RecordStudent $recordStudent)
    {
        try {
            return $recordStudent;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * A show function that instead uses the IDs of
     * the election and student.
     * Used in conjunction with another request.
     */
    public function showByIds(
        int $electionId,
        string $studentId,
    ): RecordStudent {
        try {
            $recordStudent = RecordStudent::where([
                ['election_id', '=', $electionId],
                ['student_id', '=', $studentId],
            ])->firstOrFail();
            return $recordStudent;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecordStudent $recordStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecordStudent $recordStudent)
    {
        try {
            $validated = $request->validate([
                'vote_code' => [
                    'integer',
                ],
                'vote_timestamp' => [
                    'date',
                ],
                'ac_view_timestamp' => [
                    'date',
                ],
                'is_invalid' => [
                    'boolean',
                ],
            ]);

            $recordStudent->update($validated);

            return response()->json([
                'message' => 'Record-Student successfully updated',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Alternate update function that gets the RecordStudent
     * through the election_id and student_id, instead of
     * the id itself.
     */
    public function updateByIds(Request $request) {
        try {
            $validated = $request->validate([
                'election_id' => [
                    'integer',
                    'exists:election_records,id',
                    'required',
                ],
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                    'required',
                ],
            ]);

            $recordStudent = $this->showByIds(
                $validated['election_id'],
                $validated['student_id'],
            );

            return $this->update($request, $recordStudent);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecordStudent $recordStudent)
    {
        try {
            $recordStudent->delete();

            return response()->json([
                'message' => 'Record-Candidate successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Gets the access code of a student through a QR.
     * One of the required features.
     */
    public function getQrCode(
        int $electionId,
        string $studentId,
    ) {
        try {
            $recordStudent = $this->showByIds(
                $electionId,
                $studentId,
            );

            return QrCode::size(200)
                ->generate($recordStudent->access_code);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * A way to access the code through a request, such that
     * the election and student IDs are in the body and
     * not in the URL parameters.
     */
    public function getAccessCodeQrPost(
        Request $request
    ) {
        try {
            $validated = $request->validate([
                'election_id' => [
                    'integer',
                    'exists:election_records,id',
                    'required',
                ],
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                    'required',
                ],
            ]);
            return $this->getQrCode(
                $validated['election_id'],
                $validated['student_id'],
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Helper. 
     * Gets the latest election record with the
     * 'a' status.
     */
    private function getCurrentlyActiveElection() {
        try {
            return ElectionRecord::query()
                ->where('status', 'a')
                ->latest()
                ->firstOrFail();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getAccessCode(Request $request) {
        $validated = $request->validate([
            'student_id' => [
                'max:20',
                'string',
                'required',
                'exists:students,student_id',
            ],
            'password' => [
                'max:60',
                'string',
                'required',
            ]
        ]);

        // Confirm password
        if (!Hash::check(
            $validated['password'], 
            $request->user()->password,
        )) {
            return redirect()
                ->back()
                ->withErrors([
                    'password' => 'Incorrect password',
                ]);
        }

        $activeElection = $this->getCurrentlyActiveElection();

        if (!isset($activeElection)) {
            return redirect()
                ->back()
                ->withErrors([
                    'election' => 'No active election',
                ]);
        }

        $code = $this->getQrCode(
            $activeElection->id,
            $validated['student_id'],
        );

        $recordStudent = $this->showByIds(
            $activeElection->id,
            $validated['student_id'],
        );

        $recordStudent->ac_view_timestamp = Carbon::now()->toDateTimeString();
        $recordStudent->save();

        return view(
            'frontend.access-code.index',
            [
                'qr' => $code,
                'code' => $recordStudent->access_code,
            ]
        );
    }
}
