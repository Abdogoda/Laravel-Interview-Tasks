<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'user' => UserResource::make($user),
                'token' => $token
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return response()->json([
            'message' => 'Registration successful',
            'user' => UserResource::make($user),
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful']);
    }

    public function me(Request $request)
    {
        return response()->json(UserResource::make($request->user()));
    }
}
