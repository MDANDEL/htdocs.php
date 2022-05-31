@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price / 100 }} €</p>
    <img src= '{{ $product->image }}' alt="imageProduct">
    <hr>
    <br>
@endsection