@extends('templates.base')

@section('title', 'Update Store Info - PMS')

@section('content')
    <div>
        <h2>Update Store Information</h2>
        <form>
            <div>
                <label for="name">Store Name</label>
                <input type="text" id="name" name="name" readonly>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" readonly>
            </div>
            <div>
                <label for="numberOfEmployees">Number Of Employees </label>
                <input type="text" id="numberOfEmployees" name="numberOfEmployees" readonly>
            </div>
            <div>
                <label for="logo">logo</label>
                <input type="file" id="logo" name="logo" readonly>
            </div>
            <div>
                <button type="button" disabled>Update Store</button>
                <button type="button" disabled>Cancel</button>
            </div>
        </form>
    </div>
@endsection

