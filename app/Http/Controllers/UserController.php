<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $this->service->register($data);
        // return response()->json(['message' => 'user created', 'userData' => $user], 201);
        return redirect('loginpage')->with('message', 'User Registerd Successfully');

    }

    // public function login(LoginUserRequest $request)
    // {
    //     $data = $request->validated();
    //     $user = $this->service->login($data);
    //     if (!$user) {
    //         return redirect('loginpage')->with('error', 'Wrong email or password');
    //     }
    //     // $token = $user->createToken('auth_Token')->plainTextToken;

    //     return redirect('shopdashboard');
    //     // return response()->json(['message'=>'user loged in','user'=>$user,'Token'=>$token],201);
    // }


    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        // Track attempts using cache (RateLimiter)
        $key = 'login-attempts:' . $request->ip();
        $maxAttempts = 5;

        if (!RateLimiter::remaining($key, $maxAttempts)) 
        {
            return back()->with('error', 'Too many attempts. Try again later.');
        }

        // Try login
        if (!Auth::attempt($data)) 
        {
            // Increase attempt count
            RateLimiter::hit($key, 60); // 60 sec decay

            $remaining = RateLimiter::remaining($key, $maxAttempts);

            return back()
            ->with('error', "Wrong email or password. ($remaining attempt left)");
        }

        // If login success — clear attempts
        RateLimiter::clear($key);

        return redirect('shopdashboard');
    }


    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();

    // return response()->json(['message' => 'User logged out successfully'], 200);
    //     return redirect('index');

    // }

    public function logout()
    {
        $this->service->logout();
        return redirect('index')->with('message', 'User Loged Out Successfully');
    }
}
