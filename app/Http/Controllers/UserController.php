<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->service->login($request->only('email', 'password'));

        // $token = $user->createToken('auth_Token')->plainTextToken;

        return redirect('shopdashboard');
        // return response()->json(['message'=>'user loged in','user'=>$user,'Token'=>$token],201);
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
