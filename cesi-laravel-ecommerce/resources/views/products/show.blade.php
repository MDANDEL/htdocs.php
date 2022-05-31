@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <h1>{{ $product->name }} <a class="btn btn-primary" href="{{ route('products.edit', ['product' => $product]) }}"><i class="bi bi-pencil"></i> </a></h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price / 100 }} €</p>
    <img src= '{{ $product->image }}' alt="imageProduct">
    <hr>
    <br>
@endsection
