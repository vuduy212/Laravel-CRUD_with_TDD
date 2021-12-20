@extends('layouts.app')

@section('content')
<a href="{{ route('products.index') }}" class="btn btn-primary">Home</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->price}}</td>
            <td>{{$products->desc}}</td>
            <td>
                <form action="{{ route('products.delete', $products->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('products.edit', $products->id) }}" class="btn btn-primary">Edit</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
