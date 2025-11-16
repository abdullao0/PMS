@extends('templates.base')

@section('title', 'Add Product - PMS')

@section('content')
    <div>
        <h2>Add New Product</h2>
        <form>
            @csfr
            <div>
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" readonly>
            </div>
            <div>
                <label for="QTY">QTY</label>
                <input type="number" id="QTY" name="QTY" readonly>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" readonly>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" readonly>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" readonly>
            </div>
            <div>
                <label for="category">Category</label>
                <select id="category" name="category" disabled>
                    <option value="">Select Category</option>
                </select>
            </div>
            <div>
                <button type="button" disabled>Add Product</button>
                <button type="button" disabled>Cancel</button>
            </div>
        </form>
    </div>
@endsection

