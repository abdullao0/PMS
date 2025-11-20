@extends('templates.base')

@section('title', 'Shop Dashboard - PMS')

@section('content')
    <div>
        
        <h2>{{ $shop->name }}</h2>
        <p>numberOfEmployees {{ $shop->numberOfEmployees }}</p>
        <p>{{ $shop->user->email }}</p>
    </div>
    <div>
        <button type="button"><a href="{{ route('addproductpage',$products->pluck('id')) }}">Add Product</a></button>
        <button type="button"><a href="{{ route('shopInfoPage',$shop->id) }}">Shop Info</a></button>
    </div>
    <div>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:left;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>QTY</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->Price }}</td>
                <td>{{ $product->QTY }}</td>
                <td>
                    <form action="{{ route('updateproduct', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" style="color:red;">
                                Update                          
                    </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('deleteproduct', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" style="color:red;">
                                Delete                          
                    </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">No products yet</td>
            </tr>
        @endforelse
    </tbody>
</table>

    </div>
@endsection

