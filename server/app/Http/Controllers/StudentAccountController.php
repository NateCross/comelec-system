<?php

namespace App\Http\Controllers;

use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        try {
            $validated = $request->validate([
                'student_id' => [
                    'max:20',
                    'string',
                    'required',
                    'exists:students,student_id',
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
                    Rule::in(['a', 'i', 'v']),
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
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAccount $studentAccount)
    {
        try {
            return $studentAccount;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
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
        try {
            $validated = $request->validate([
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                ],
                'full_name' => [
                    'max:70',
                    'string',
                ],
                'email' => [
                    'max:100',
                    'string',
                    'email',
                ],
                'password' => [
                    'max:60',
                    'string',
                ],
                'status' => [
                    Rule::in(['a', 'i', 'v']),
                ],
            ]);

            if (isset($validated['password'])) {
                $validated['password'] = 
                    Hash::make($validated['password']);
            }

            $studentAccount->update($validated);

            // TODO: Regenerate session here
            return response()->json([
                'message' => 'Student Account successfully updated',
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
    public function destroy(StudentAccount $studentAccount)
    {
        try {
            $studentAccount->delete();

            return response()->json([
                'message' => 'Election Record successfully deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function login(Request $request) {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * This logout function works by revoking the token
     * sent by the request. This is in line with the mobile
     * style of authentication as per the docs. By 
     * revoking this, we deny access, thereby logging 
     * the user out.
     */
    public function logout() {
        try {
            Auth::guard('sanctum')->user()->tokens()->delete();

            return response()->json([
                'message' => 'Successfully logged user out',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
