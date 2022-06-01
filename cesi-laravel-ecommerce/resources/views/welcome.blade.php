@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')

    <h1>Page d'accueil</h1>
    <h2>Nos derniers produits</h2>

    <div class="row">
    @foreach($latestProducts as $product)
        <strong>{{ $product->name }}</strong>
        <p>{{ $product->price / 100 }} €</p>
        <img src= '{{ asset($product->image) }}' alt="imageProduct" width="200">
        <p>{{ $product->user ? $product->user->name : ''  }}</p>
        <br>

        <a href="{{ route('products.show', ['product' => $product]) }}">Voir le produit</a>

        <a href="{{ route('products.edit', ['product' => $product]) }}">Editer le produit</a>

        <a href="{{ route('products.download', ['product' => $product]) }}">Télécharger le produit</a>

        <a href="{{ route('products.send-mail', ['product' => $product]) }}">Envoyer eMail</a>

        <form action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Supprimer le produit</button>
        </form>
        <hr>
    @endforeach
    </div>
@endsection
