<?php

namespace App\Http\Controllers;

use App\Models\ComelecUser;
use Illuminate\Http\Request;
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
        $validated = $request->validate([
            'student_id' => [
                'max:20',
                'string',
                'required',
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
    }

    /**
     * Display the specified resource.
     */
    public function show(ComelecUser $comelecUser)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComelecUser $comelecUser)
    {
        //
    }

    public function login(Request $request) {
        
    }
}
