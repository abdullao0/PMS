@extends('templates.base')

@section('title', 'Login - PMS')

@section('content')
    @push('style')
        <style>
            .login-wrapper {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                padding: 2rem;
            }

            .login-card {
                background: #ffffff;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
                padding: 3rem;
                width: 100%;
                max-width: 450px;
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

            .login-title {
                font-size: 2rem;
                font-weight: bold;
                color: #1e293b;
                margin-bottom: 2rem;
                text-align: center;
            }

            .session-error {
                background: rgba(239, 68, 68, 0.1);
                color: #ef4444;
                padding: 1rem;
                border-radius: 10px;
                margin-bottom: 1.5rem;
                border-left: 4px solid #ef4444;
                font-size: 0.95rem;
            }

            .login-form .form-field {
                margin-bottom: 1.5rem;
            }

            .login-form label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 600;
                color: #1e293b;
                font-size: 0.95rem;
            }

            .login-form input {
                width: 100%;
                padding: 0.85rem;
                border: 2px solid #e2e8f0;
                border-radius: 10px;
                font-size: 1rem;
                transition: all 0.3s ease;
                box-sizing: border-box;
            }

            .login-form input:focus {
                outline: none;
                border-color: #10b981;
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            }

            .error-message {
                color: #ef4444;
                font-size: 0.875rem;
                margin-top: 0.5rem;
            }

            .btn-login {
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

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
            }

            .btn-login:active {
                transform: translateY(0);
            }

            .login-footer {
                text-align: center;
                color: #64748b;
                font-size: 0.95rem;
                margin-top: 1rem;
            }

            .login-footer a {
                color: #10b981;
                text-decoration: none;
                font-weight: 600;
                transition: color 0.3s;
            }

            .login-footer a:hover {
                color: #059669;
                text-decoration: underline;
            }

            @media (max-width: 768px) {
                .login-card {
                    padding: 2rem;
                }

                .login-title {
                    font-size: 1.75rem;
                }
            }
        </style>
    @endpush


    <div class="login-wrapper">
        <div class="login-card">
            <h2 class="login-title">Login</h2>

            @if (session('error'))
                <div class="session-error">
                    <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                </div>
            @endif



            @if (session('message'))
                @php
                    $msg = session('message');
                @endphp

                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ $msg }}',
                        confirmButtonColor: '#10b981'
                    });
                </script>
            @endif
            <form class="login-form" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-field">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
                <div class="login-footer">
                    <p>Don't have an account? <a href="{{ route('registerpage') }}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection