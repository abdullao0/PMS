@extends('templates.base')

@section('title', 'Register - PMS')

@section('content')
<style>
    .register-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 2rem;
    }

    .register-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        padding: 3rem;
        width: 100%;
        max-width: 500px;
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .register-title {
        font-size: 2rem;
        font-weight: bold;
        color: #1e293b;
        margin-bottom: 2rem;
        text-align: center;
    }

    .register-form .form-field {
        margin-bottom: 1.5rem;
    }

    .register-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .register-form input {
        width: 100%;
        padding: 0.85rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .register-form input:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .btn-register {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 1rem;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }

    .register-footer {
        text-align: center;
        color: #64748b;
        font-size: 0.95rem;
        margin-top: 1rem;
    }

    .register-footer a {
        color: #10b981;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .register-footer a:hover {
        color: #059669;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .register-card {
            padding: 2rem;
        }
        
        .register-title {
            font-size: 1.75rem;
        }
    }
</style>

<div class="register-wrapper">
    <div class="register-card">
        <h2 class="register-title">Register</h2>
        <form class="register-form" method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-field">
                <label for="age">How Old Are You?</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}">
                @error('age')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn-register">Register</button>
            <div class="register-footer">
                <p>Already have an account? <a href="{{ route('loginpage') }}">Login</a></p>
            </div>
        </form>
    </div>
</div>
@endsection