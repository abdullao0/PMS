@extends('templates.base')

@section('title', 'Update Product - PMS')

@section('content')
    <div>
        <h2>Update Product</h2>
        <form method="post" action="{{ route('updateproduct') }}">
            @csrf
            <div>
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="QTY">QTY</label>
                <input type="number" id="QTY" name="QTY" >
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" >
            </div>
            <div>
                <label for="category">Category</label>
                <select id="category" name="category" disabled>
                    <option value="">Select Category</option>
                </select>
            </div>
            <div>
                <button type="submit" >Update Product</button>
            </div>
        </form>
    </div>
@endsection

