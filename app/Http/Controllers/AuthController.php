<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed|string|min:6'
        ]);
        $validated['role'] = 'student';
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $token = $user->createToken($request->name);
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 201);
    }
    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email|max:255|exists:users',
                'password' => 'required'
            ]
        );
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'invalid credentials'
            ], 401);
        }
        $token = $user->createToken($user->name);
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
            'role' => $user->role
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ], 201);
    }
    public function createAdminInstructor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed|string|min:6',
            'role' => ['required', Rule::in(['admin', 'instructor'])]
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return response()->json([
            'message' => ucfirst($validated['role'] .' ' . 'created successfully'),
            'user' => $user
        ], 201);
    }
}
