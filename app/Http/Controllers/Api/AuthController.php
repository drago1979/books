<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * @param AuthLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Credentials are not valid.'
            ], 422);
        }

        $user = User::query()
            ->where('email', $credentials['email'])
            ->first();

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken
        ]);
    }
}
