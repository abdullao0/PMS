@extends('templates.base')

@section('title', 'Add Shop - PMS')

@section('content')
    <div>
        <h2>Add New Store</h2>
        <form method="post" action="{{ route('makeshop') }}">
            @csrf
            <div>
                <label for="name">Shop Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description">
            </div>
            <div>
                <label for="numberOfEmployees">Number Of Employees </label>
                <input type="text" id="numberOfEmployees" name="numberOfEmployees">
            </div>
            <div>
                <label for="logo">logo</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div>
                <button type="submit" >Add Shop</button>
            </div>
        </form>
    </div>
@endsection

