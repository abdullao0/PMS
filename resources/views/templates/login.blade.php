@extends('templates.base')

@section('title', 'Login - PMS')

@section('content')
    <div>
        <h2>Login</h2>
        <form>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" readonly>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" readonly>
            </div>
            <button type="button" disabled>Login</button>
            <div>
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
@endsection

