@extends('templates.base')

@section('title', 'Add Product - PMS') 

@push('style')
<style>
    .addproduct-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .addproduct-card {
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

    .addproduct-title {
        font-size: 2rem;
        font-weight: bold;
        color: #1e293b;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #10b981;
    }

    .addproduct-form .form-field {
        margin-bottom: 1.5rem;
    }

    .addproduct-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .addproduct-form input,
    .addproduct-form select,
    .addproduct-form textarea {
        width: 100%;
        padding: 0.85rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .addproduct-form input:focus,
    .addproduct-form select:focus,
    .addproduct-form textarea:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .addproduct-form input[type="file"] {
        padding: 0.6rem;
        cursor: pointer;
    }

    .addproduct-form select:disabled {
        background-color: #f1f5f9;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .addproduct-form textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }

    .btn-addproduct {
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

    .btn-addproduct:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-addproduct:active {
        transform: translateY(0);
    }

    /* Three Column Grid for Name, Price, and Quantity in one row */
    .form-grid-three {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 0.5rem 0;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        font-weight: 400;
    }

    .checkbox-label input[type="checkbox"] {
        width: auto;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .addproduct-container {
            padding: 0 1rem;
        }

        .addproduct-card {
            padding: 2rem;
        }
        
        .addproduct-title {
            font-size: 1.75rem;
        }

        .form-grid-three {
            grid-template-columns: 1fr;
        }
    }
</style>

@endpush

@section('content')

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
<div class="addproduct-container">
    <div class="addproduct-card">
        <h2 class="addproduct-title">Add New Product</h2>
        <form class="addproduct-form" method="post" action="{{ route('addproduct') }}" enctype="multipart/form-data" novalidate>
            @csrf
            
            <!-- Name, Price, and Quantity in one row -->
            <div class="form-grid-three">
                <div class="form-field">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter product name">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="price">Price *</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price" step="0.01" min="0">
                    @error('price')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="QTY">Quantity *</label>
                    <input type="number" id="QTY" name="QTY" value="{{ old('QTY') }}" placeholder="Enter quantity" min="0">
                    @error('QTY')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-grid">
                <div class="form-field">
                    <label>Categories</label>
                    <div class="checkbox-group">
                        @foreach(\App\Models\Category::all() as $category)
                            <label class="checkbox-label">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, old('category', [])) ? 'checked' : '' }}>
                                <span>{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('category')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn-addproduct">
                    <i class="bi bi-plus-circle"></i> Add Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection