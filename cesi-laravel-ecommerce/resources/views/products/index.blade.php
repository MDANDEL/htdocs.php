@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
    <h1>Liste des produits  </h1>
    
    @foreach($products as $product)
        <strong>{{ $product->name }}</strong>
        <p>{{ $product->price }}</p>
        <a href="{{ route('products.show', ['product' => $product]) }}">Détails de l'article</a>
        <hr>
    @endforeach
@endsection