<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        try {
            $data = $request->validated();
            /** @var \App\Models\User $user */
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            $token = $user->createToken('main')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during signup. Please try again later.',
                'error' => $e->getMessage() // Remove or comment out in production
            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Provided email address or password is incorrect!'
                ], 422);
            }

            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred. Please try again.',
                'error' => $e->getMessage() // Remove or comment out in production
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            /** @var \App\Models\User $user */
            $user = $request->user();
            $user->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Logged out successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during logout. Please try again later.',
                'error' => $e->getMessage() // Remove or comment out in production
            ], 500);
        }
    }
}
