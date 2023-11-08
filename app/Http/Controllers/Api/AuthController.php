<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $credentials = $request->only([
            'email',
            'password',
            'device_name'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationValidationException::withMessages([
                'email' => 'the provided credentials are incorrect'
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        // $user = User::where('email', '=', $request->user->email)->get();

        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json([
            'logout' => "sucess"
        ]);
    }

    public function me(Request $request)
    {
        $user = auth()->user();
        return response()->json([
            'user' => $user
        ]);
    }
}
