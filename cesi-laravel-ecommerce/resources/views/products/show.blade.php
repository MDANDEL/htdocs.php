@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <div class="d-flex flex-row align-items-center">
        <h1>{{ $product->name }}</h1>
            <a class="btn btn-primary" href="{{ route('products.edit', ['product' => $product]) }}"><i class="bi bi-pencil"></i> </a>
            <form action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
            </form>
    </div>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price / 100 }} €</p>
    <img src= '{{ asset($product->image) }}' alt="imageProduct">
    <hr>
    <br>
@endsection
