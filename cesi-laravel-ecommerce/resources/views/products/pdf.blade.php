<style>
    .content{
        background: red;
    }
</style>

<div class="content">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->price }}</p>
    <p>{{ $product->description }}</p>
    <img src="{{ public_path($product->image) }}"alt="" width="200">
</div>
