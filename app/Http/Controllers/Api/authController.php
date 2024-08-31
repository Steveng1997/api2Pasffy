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
            'email' => 'nullable|string|email|max:255|unique:users',
            'expiration' => 'boolean',
            'password' => 'nullable|string|min:8',
            'id_admin' => 'nullable|numeric',
            'id_manager' => 'nullable|numeric'
        ]);

        $user = User::create([
            'active' => $validatedData['active'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'expiration' => $validatedData['expiration'],
            'password' => Hash::make($validatedData['password']),
            'id_admin' => $validatedData['id_admin'],
            'id_manager' => $validatedData['id_manager']
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
        $user->token = $user->createToken('auth_token');

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'user' => $user,
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

    public function getByEmail($email)
    {
        $user = User::where(['email' => $email])->get();

        if (!$user) {
            $data = [
                'message' => 'The email is already registered',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'user' => $user,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getById($id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'user' => $user,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            $data = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $users->email = $request->email;
        $users->name = $request->name;
        $users->password = $request->password;

        $users->save();

        if ($users) {
            $data = [
                'message' => 'The user was updated!',
                'users' => $users,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }
}
