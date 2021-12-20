@extends('layouts.app')

<form action="{{ route('products.store') }}" method="POST" class="container">
    @csrf
    <a href="{{ route('products.index') }}" class="btn btn-primary">Home</a>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
        @error('price')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc">
        @error('desc')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
