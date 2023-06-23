<?php

namespace App\Http\Controllers;

use App\Helpers\Masterlist;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::query()->whereKeyNot('0000')->get();
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
            'student_id' => [
                'max:20',
                'string',
                'required',
            ],
            'full_name' => [
                'max:70',
                'string',
                'nullable',
            ],
            'college' => [
                'max:50',
                'string',
                'nullable',
            ],
            'is_enrolled' => [
                'boolean',
                'nullable',
            ],
        ]);

        Student::create($validated);

        return redirect()->route('master-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        try {
            return $student;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
            $validated = $request->validate([
                'full_name' => [
                    'max:70',
                    'string',
                    'nullable',
                ],
                'college' => [
                    'max:50',
                    'string',
                    'nullable',
                ],
                'is_enrolled' => [
                    'boolean',
                    'nullable',
                ],
            ]);

            $student->updateOrFail($validated);

            return redirect()->route('master-list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();

            return response()->json([
                'message' => 'Student successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

}
