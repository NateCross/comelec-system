<?php

namespace App\Http\Controllers;

use App\Models\ComelecUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ComelecUserController extends Controller
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
                'student_id' => [
                    'max:20',
                    'string',
                    'required',
                    'exists:students,student_id',
                ],
                'username' => [
                    'max:50',
                    'string',
                    'required',
                ],
                'name' => [
                    'max:100',
                    'string',
                    'required',
                ],
                'password' => [
                    'max:60',
                    'string',
                    'required',
                ],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $comelecUser = ComelecUser::create($validated);

            $token = $comelecUser->createToken('ApiToken')
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
    public function show(ComelecUser $comelecUser)
    {
        try {
            return $comelecUser;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComelecUser $comelecUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComelecUser $comelecUser)
    {
        try {
            $validated = $request->validate([
                'student_id' => [
                    'max:20',
                    'string',
                    'exists:students,student_id',
                ],
                'username' => [
                    'max:50',
                    'string',
                ],
                'name' => [
                    'max:100',
                    'string',
                ],
                'password' => [
                    'max:60',
                    'string',
                ],
            ]);

            if (isset($validated['password'])) {
                $validated['password'] = 
                    Hash::make($validated['password']);
            }

            $comelecUser->update($validated);

            // TODO: Regenerate session here
            return response()->json([
                'message' => 'Comelec User successfully updated',
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
    public function destroy(ComelecUser $comelecUser)
    {
        try {
            $comelecUser->delete();

            // Regenerate session here
            return response()->json([
                'message' => 'Comelec User successfully deleted',
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
                'username' => [
                    'max:50',
                    'string',
                    'required',
                ],
                'password' => [
                    'max:60',
                    'string',
                    'required',
                ],
            ]);

            if (!Auth::guard('comelec_user')->attempt($validated)) {
                return response()->json([
                    'error' => 'Invalid login details',
                ], 401);
            }

            $comelecUser = ComelecUser::where(
                'username',
                $validated['username'],
            )->firstOrFail();

            $token = $comelecUser->createToken('ApiToken')
                ->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $comelecUser,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function logout() {
        try {
            Auth::guard('comelec_user')->logout();

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
