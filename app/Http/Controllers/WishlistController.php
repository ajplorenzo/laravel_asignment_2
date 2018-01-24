<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Product $product)
	{
		dd($product);

		Whishlist::create([
			'user_id' => auth()->user()->id,
			'product_id' => request('id')
		]);	
		return back();
	}
}
