<?php

namespace App\Http\Controllers;

use App\Models\ComelecUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        return view('frontend.accounts-admin.create');
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
            ],
            'password' => [
                'max:60',
                'string',
                'required',
            ],
            'role' => [
                Rule::in(['s', 'a', 'c', 'm', 'p']),
                'required',
            ],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        ComelecUser::create($validated);

        return redirect()->back();
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
        return view(
            'frontend.accounts-admin.edit',
            [
                'user' => $comelecUser,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComelecUser $comelecUser)
    {
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
                'nullable',
            ],
            'password_confirm' => [
                'max:60',
                'string',
            ],
            'role' => [
                Rule::in(['s', 'a', 'c', 'm', 'p']),
            ],
        ]);

        if (isset($validated['password'])) {
            if (!isset($validated['password_confirm']))
                return back()->withErrors([
                    'password' => 'Password not confirmed'
                ]);
            if ($validated['password'] !== $validated['password_confirm'])
                return back()->withErrors([
                    'confirm' => 'Passwords do not match'
                ]);
            
            unset($validated['password_confirm']);
            $validated['password'] = 
                Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if (isset($comelecUser['id']))
            $comelecUser->update($validated);
        else
            $request->user()->update($validated);

        if (!isset($comelecUser['id']))
            return redirect()->back();
        else
            return redirect()->route('account.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return [
            'message' => 'Successfully deleted user',
        ];
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
                return back()->withErrors([
                    'username' => 'Invalid login details',
                ])->onlyInput('username');
            }

            $comelecUser = ComelecUser::where(
                'username',
                $validated['username'],
            )->firstOrFail();

            return redirect()->intended([
                's' => 'election',
                'a' => 'election',
                'c' => 'candidates',
                'm' => 'students',
                'p' => 'access',
            ][$comelecUser->role]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request) {
        $request->user()->logout();

        return redirect()->route('login');
    }

    public function viewProfile() {
        return view('frontend.accounts-profile.index');
    }

    public function viewAdmin() {
        return view(
            'frontend.accounts-admin.index',
            [
                'users' =>
                ComelecUser::query()
                    ->with('student')
                    ->paginate(10),
            ],
        );
    }
}
