@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <form action="{{ route('products.update', $product) }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description }}">
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $product->image }}">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary">Modifier</button>

    </form>
    <br>
@endsection
