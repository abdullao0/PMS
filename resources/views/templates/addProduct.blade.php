@extends('templates.base')

@section('title', 'Add Product - PMS')

@section('content')
    <div>
        <h2>Add New Product</h2>
        <form method="post" action="{{ route('addproduct') }}">
            @csrf
            <div>
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name">
                @error('name')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="QTY">QTY</label>
                <input type="number" id="QTY" name="QTY">
                @error('QYT')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price">
                @error('price')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description">
                @error('description')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="category">Category</label>
                <select id="category" name="category" disabled>
                    <option value="">Select Category</option>
                </select>
            </div>
            <div>
                <button type="submit" >Add Product</button>
            </div>
        </form>
    </div>
@endsection

