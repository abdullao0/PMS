<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|max:155',
            'password' => 'required|string|max:25|min:8|confirmed',
            'email' => 'required|string|max:255|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'user created', 'userData' => $user], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string|max:25|min:8',
            'email' => 'required|string|max:255',

        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return response()->json(['message' => 'wrong password or email'], 401);
        }
        $user = Auth::user();

        $token = $user->createToken('auth_Token')->plainTextToken;

        return response()->json(['token' => $token, 'userData' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'User logged out successfully'], 200);
    }

}
