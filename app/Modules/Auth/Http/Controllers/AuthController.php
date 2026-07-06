<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Modules\Auth\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController
{
    public function __construct(private readonly JWTAuth $jwt)
    {
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $token = $this->jwt->attempt($credentials);

        if (! $token) {
            return response()->json([
                'message' => 'Credenciales inválidas',
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => (int) config('jwt.ttl') * 60,
        ]);
    }

    public function logout(Request $request)
    {
        $this->jwt->invalidate($request->bearerToken());

        return response()->json([
            'message' => 'Sesión cerrada',
        ]);
    }
}

