@extends('templates.base')

@section('title', 'Shop Homepage - PMS')

@section('content')
    <div>
        
        <h2>{{ $shop->name }}</h2>
        <p>numberOfEmployees {{ $shop->numberOfEmployees }}</p>
        <p>{{ $shop->user->email }}</p>
    </div>
    <div>
        <button type="button"><a href="{{ route('addproductpage',$products->pluck('id')) }}">Add Product</a></button>
        <button type="button"><a href="{{ route('updateshoppage',$shop->id) }}"> Update Shop Info</a></button>
    </div>
    <div>
        @forelse($products as $product)
        <div>
            <h3>{{ $product->name }}</h3>
            <h3>{{ $product->description }}</h3>
            <h3>{{$product->Price}}</h3>
            <h3>{{$product->QTY}}</h3>
        </div>
        @empty
        <h3>no products yet</h3>
        @endforelse
    </div>
@endsection

