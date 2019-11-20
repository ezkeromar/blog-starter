<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = Auth::guard()->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = Auth::guard()->user();
        return response()->json(compact('token', 'user'));
    }

    public function me()
    {
        $user = Auth::guard()->user();
        return response()->json($user);
    }

    public function refresh()
    {
        $token = Auth::guard()->refresh();
        return response()->json(compact('token'));
    }

    public function logout()
    {
        Auth::guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
