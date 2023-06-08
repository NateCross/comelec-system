<?php

namespace App\Http\Controllers;

use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAccountController extends Controller
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
     * Register function
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
                'required',
            ],
            'email' => [
                'max:100',
                'string',
                'email',
                'required',
            ],
            'password' => [
                'max:60',
                'string',
                'required',
            ],
            'status' => [
                'max:1',
                'required',
            ],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $studentAccount = StudentAccount::create($validated);

        $token = $studentAccount->createToken('ApiToken')
            ->plainTextToken;
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAccount $studentAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAccount $studentAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAccount $studentAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAccount $studentAccount)
    {
        //
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'student_id' => [
                'max:20',
                'string',
                'required',
            ],
            'password' => [
                'max:60',
                'string',
                'required',
            ],
        ]);

        if (!Auth::guard('student_account')->attempt($validated)) {
            return response()->json([
                'error' => 'Invalid login details. Register if you have not created your account yet. If you forgot your password or any other issue, contact COMELEC.'
            ], 401);
        }

        $studentAccount = StudentAccount::where(
            'student_id',
            $validated['student_id'],
        )->firstOrFail();

        $token = $studentAccount->createToken('ApiToken')
            ->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $studentAccount,
        ]);
    }
}
