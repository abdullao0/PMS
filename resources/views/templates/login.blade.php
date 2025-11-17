@extends('templates.base')

@section('title', 'Login - PMS')

@section('content')
    <div>
        <h2>Login</h2>
        @if (session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <form  method="post" action="{{ route('login') }}">
            @csrf
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
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" >Login</button>
            <div>
                <p>Don't have an account? <a href="{{ route('registerpage') }}">Register</a></p>
            </div>
        </form>
    </div>
@endsection

