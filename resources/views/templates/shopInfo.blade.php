@extends('templates.base')

@section('title', 'Shop Info - PMS')

@section('content')
    <div>



    <form action="{{ route('activeproducts') }}" method="get">
        <button type="submit">
            send report for active products
        </button>
    </form>

    <form action="{{ route('unactiveproducts') }}" method="get">
        <button type="submit">
            send report for unactive products
        </button>
    </form>



        <h2>Update Shop Information</h2>
        <form method="post" action="{{ route('updateshop', $id) }}">
            @csrf
            <div>
                <label for="name">Store Name</label>
                <input type="text" id="name" name="name">
                @error('name')
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
                <label for="numberOfEmployees">Number Of Employees </label>
                <input type="text" id="numberOfEmployees" name="numberOfEmployees">
                @error('numberOfEmployees')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="logo">logo</label>
                <input type="file" id="logo" name="logo">
                @error('logo')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit">Update Store</button>
            </div>
        </form>

        <form action="{{ route('logout') }}" method="post">
            <button> log out</button>
        </form>
    </div>
@endsection