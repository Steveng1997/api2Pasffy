<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'active' => 'boolean',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'expiration' => 'boolean',
            'password' => 'required|string|min:8',
            'idAdmin' => 'nullable|numeric'
        ]);

        $user = User::create([
            'active' => $validatedData['active'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'expiration' => $validatedData['expiration'],
            'password' => Hash::make($validatedData['password']),
            'idAdmin' => $validatedData['idAdmin']
        ]);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('email',  $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => ['Username or password incorrect'],
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name,
            'token' => $user->createToken('auth_token'),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'User logged out successfully'
            ]
        );
    }
}
