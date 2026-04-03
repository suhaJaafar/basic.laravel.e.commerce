<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'These credentials do not match our records.'
            ], 401);
        }

        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user'  => $user->makeHidden(['password', 'remember_token']),
            'token' => $token
        ];

        return response()->json($response, 200);
    }
}
