@extends('layouts.app')

<form action="{{ route('products.update', $products->id) }}" method="POST" class="container">
    @method('PUT')
    @csrf
    <a href="{{ route('products.index') }}" class="btn btn-primary">Home</a>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $products->name }}">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ $products->price }}">
        @error('price')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" value="{{ $products->desc }}">
        @error('desc')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
