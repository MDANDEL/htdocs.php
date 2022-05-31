<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();

        //$products = Product::where('price', '>', 100);

        // dd = var_dump ('Lister les prdouits) following a die()
        //dd('Lister les produits');

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/products');

            $product->image = asset('storage/products/'.$request->file('image')->hashName());
            $product->save();
        }
       return redirect()->route('products.show', $product)->with('status', 'Product created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/products');

            $product->image = asset('storage/products/'.$request->file('image')->hashName());
            $product->save();
        }


        // update des champs du produit un par un :
        /*$product->name = $request->get('name');
        $product->save();*/

        return redirect()->route('products.show', ['product' => $product])->with('status', 'Product updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Product deleted !');
    }
}
