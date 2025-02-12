<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in.
        if (!Auth::attempt($request->only('email', 'password'))) {
            // return response()->json([
            //     'message' => 'Invalid login details. Unauthorized access!'
            // ], 401);
            return ApiResponse::unauthorized();
        }

        // Get the authenticated user.
        $user = Auth::user();
        $token = $user->createToken($user->name)->plainTextToken;

        // Return the token.
        // return response()->json([
        //     'token' => $token,
        //     'message' => 'Login successful!'
        // ], 200);

        return ApiResponse::success([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token,
            'message' => 'Login successful!'
        ]);
    }
}
