@extends('templates.base')

@section('title', 'Add Shop - PMS')

@section('content')
@push('style')
<style>
    .makeshop-container {
        max-width: 700px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .makeshop-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 3rem;
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

    .makeshop-title {
        font-size: 2rem;
        font-weight: bold;
        color: #1e293b;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #10b981;
        text-align: center;
    }

    .makeshop-form .form-field {
        margin-bottom: 1.5rem;
    }

    .makeshop-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .makeshop-form input,
    .makeshop-form textarea {
        width: 100%;
        padding: 0.85rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .makeshop-form input:focus,
    .makeshop-form textarea:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .makeshop-form input[type="file"] {
        padding: 0.6rem;
        cursor: pointer;
    }

    .makeshop-form textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }

    .btn-makeshop {
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
        margin-top: 1rem;
    }

    .btn-makeshop:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-makeshop:active {
        transform: translateY(0);
    }

    @media (max-width: 768px) {
        .makeshop-container {
            padding: 0 1rem;
        }

        .makeshop-card {
            padding: 2rem;
        }
        
        .makeshop-title {
            font-size: 1.75rem;
        }
    }
</style>
@endpush


<div class="makeshop-container">
    <div class="makeshop-card">
        <h2 class="makeshop-title">Make Your Shop</h2>
        <form class="makeshop-form" method="post" action="{{ route('makeshop') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-field">
                <label for="name">Shop Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter shop name">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Describe your shop">{{ old('description') }}</textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-field">
                <label for="numberOfEmployees">Number of Employees</label>
                <input type="number" id="numberOfEmployees" name="numberOfEmployees" value="{{ old('numberOfEmployees') }}" placeholder="Enter number of employees" min="0">
                @error('numberOfEmployees')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-field">
                <label for="logo">Shop Logo</label>
                <input type="file" id="logo" name="logo" accept="image/*">
                @error('logo')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn-makeshop">
                    <i class="bi bi-shop"></i> Create Shop
                </button>
            </div>
        </form>
    </div>
</div>
@endsection