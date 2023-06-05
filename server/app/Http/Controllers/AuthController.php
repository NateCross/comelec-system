<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ]);

        // var_dump($validatedData);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('ApiToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details',
            ], 401);
        }

        $user = User::where('email', $request['email'])
            ->firstOrFail();

        $token = $user->createToken('ApiToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function getToken(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'device_name' => 'required',
        ]);
 
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
 
        return $user->createToken($request->device_name)->plainTextToken;
    }
}
