@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <form action="{{ route('products.update', $product) }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        <input type="text" name="description" id="description" class="form-control" value="{{ $product->description }}">
        <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">

        <button type="submit" class="btn btn-primary">Modifier</button>

    </form>
    <br>
@endsection
