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
            </div>
            <div>
                <label for="QTY">QTY</label>
                <input type="number" id="QTY" name="QTY">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
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

