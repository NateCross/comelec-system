<?php

namespace App\Http\Controllers;

use App\Models\ElectionRecord;
use App\Models\RecordStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RecordStudentController extends Controller
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
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                    'required',
                ],
            ]);

            $validated['access_code'] = $this->generateAccessCode();
            $validated['is_invalid'] = false;

            RecordStudent::create($validated);

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
        return $recordStudent;
    }

    /**
     * 
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
        //
    }

    /**
     * Helper function.
     * 
     * Generates an access code that will be applied to
     * a particular student for a given election record.
     */
    public function generateAccessCode() {
        return Str::random(6);
    }

    public function getAccessCodeQr(
        int $electionId,
        string $studentId,
    ) {
        try {
            $recordStudent = $this->showByIds(
                $electionId,
                $studentId,
            );

            return QrCode::generate(
                $recordStudent->access_code,
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

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
            return $this->getAccessCodeQr(
                $validated['election_id'],
                $validated['student_id'],
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
