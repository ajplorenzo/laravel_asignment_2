<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['home']);
    }

    public function home()
    {
    	$products = Product::all()->sortBy("price");

    	return view('products.index', compact('products'));
    }

    public function index()
    {
    	$products = Product::all()->sortBy("price");

    	return view('products.products', compact('products'));
    }
}
