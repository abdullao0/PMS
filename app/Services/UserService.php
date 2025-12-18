<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Shop;
use App\Models\User;
use App\Mail\WellcomeBackEmail;
use App\Mail\WellcomeEmail;

class UserService
{
    public function register($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'age' => $data['age'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $shop = new Shop(['id' => $user->id]);

        // this is the conction of shop and the user 
        $user->shop()->save($shop);

        Mail::to($user->email)->send(new WellcomeEmail($user));
        return $user;
    }

    public function login($data)
    {
        if (Auth::attempt($data)) {
            session()->regenerate();
            $user = Auth::user();

            try {
                Mail::to($user->email)->send(new WellcomeBackEmail($user));
            } catch (\Throwable $e) {
                // Log error or ignore if mail fails, but don't break login flow
            }

            return $user;
        }

        return null;
    }
}
