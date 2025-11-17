<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        if(!Auth::attempt($request->only('email','password')))
            return redirect('loginpage')->with('error','Wrong password or email');
        
        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user->createToken('auth_Token')->plainTextToken;

        if(isset($token))
        {
            if(Shop::where('user_id',$user->id)->exists())
            {
                return redirect('shopdashboard');
            }
        }
    
        return redirect('makeshoppage');
        // return response()->json(['message'=>'user loged in','user'=>$user,'Token'=>$token],201);
        
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'User logged out successfully'], 200);
    }

    public function mail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'message' => 'required|string|max:255',

        ]);

        // Mail::to($request->email)->send(new in($user));
        return redirect('index');
    }

}
