@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <h1>Editer le produit</h1>
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $product->image }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if($product->image)
             <img src="{{ $product->image }}" alt="" width="200"/>
        @endif

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <br>
@endsection
