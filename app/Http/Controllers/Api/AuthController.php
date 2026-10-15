<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * For login user and return token.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Invalid credentials',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * For logout user and revoke token.
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * For show user profile.
     */
    public function me()
    {
        $guard = Auth::guard('api');

        return response()->json($guard->user()->load('hobbies'));
    }

    /**
     * For refresh token and return new token.
     */
    public function refresh()
    {
        $guard = Auth::guard('api');

        return $this->respondWithToken($guard->refresh());
    }

    protected function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user(),
        ]);
    }
}
