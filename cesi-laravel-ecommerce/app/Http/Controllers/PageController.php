<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::take(3)->orderBy('updated_at', 'desc')->get();

        return view('welcome', ['latestProducts'=>$products]);
    }
}
