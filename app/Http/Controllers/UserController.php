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

        $user = $this->service->register($data);
        // return response()->json(['message' => 'user created', 'userData' => $user], 201);

        Auth::login($user);
        $request->session()->regenerate();
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

        $maxAttempts = 3;
        $decaySeconds = 60;

        $key = 'login_attempt|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            return back()->with(
                'error',
                'Too many login attempts. Please try again in 1 minute.'
            );
        }

        $user = $this->service->login($data);

        if (!$user) {
            // Count failed attempt
            RateLimiter::hit($key, $decaySeconds);

            $remaining = RateLimiter::remaining($key, $maxAttempts);

            return back()->with(
                'error',
                "Wrong email or password. ({$remaining} attempts left)"
            );
        }

        // if success cleara and regenerate session

        RateLimiter::clear($key);
        $request->session()->regenerate();

        return redirect()->route('shopdashboard');
    }


    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();

    // return response()->json(['message' => 'User logged out successfully'], 200);
    //     return redirect('index');

    // }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('index')->with('message', 'User Loged Out Successfully');
    }
}
