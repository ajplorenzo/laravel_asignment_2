<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function home()
    {
    	$products = Product::all()->sortBy("price");

    	return view('products.index', compact('products'));
    }

    public function index()
    {
        if (auth()->check()) {
        	$products = Product::all()->sortBy("price");

        	return view('products.products', compact('products'));
        }
    }
}
