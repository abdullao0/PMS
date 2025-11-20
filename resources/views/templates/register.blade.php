@extends('templates.base')

@section('title', 'Register - PMS')

@section('content')
    <div>
        <h2>Register</h2>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                 @error('name')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                @error('email')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="age">How Old Are You?</label>
                <input type="number" id="age" name="age">
                @error('age')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" >Register</button>
            <div>
                <p>Already have an account? <a href="{{ route('loginpage') }}">Login</a></p>
            </div>
        </form>
    </div>
@endsection