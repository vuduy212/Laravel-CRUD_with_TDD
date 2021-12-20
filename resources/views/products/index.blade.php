@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->desc}}</td>
                <td>
                    <form action="{{ route('products.delete', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$products->links('pagination::bootstrap-4')}}
@endsection
