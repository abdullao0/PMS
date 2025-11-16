@extends('templates.base')

@section('title', 'Shop Homepage - PMS')

@section('content')
    <div>
        
        <h2>Shop Name</h2>
        <p>Shop Address</p>
        <p>Contact: email | Phone</p>
    </div>
    <div>
        <button type="button" disabled>Add Product</button>
        <button type="button" disabled>Update Store Info</button>
    </div>
    <div>
        <div>
            <h3>Product Name</h3>
            <p>Product Description</p>
            <div>$0.00</div>
        </div>
    </div>
@endsection

