@extends('templates.base')

@section('title', 'Register - PMS')

@section('content')
    <div>
        <h2>Register</h2>
        <form>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" readonly>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" readonly>
            </div>
            <div>
                <label for="age">How Old Are You?</label>
                <input type="number" id="age" name="age" readonly>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" readonly>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" readonly>
            </div>
            <button type="button" disabled>Register</button>
            <div>
                <p>Already have an account? <a href="#">Login</a></p>
            </div>
        </form>
    </div>
@endsection