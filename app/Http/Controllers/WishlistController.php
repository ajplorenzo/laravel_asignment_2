<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Product $product)
	{
		dd(request());

		Whishlist::create([
			'user_id' => auth()->user()->id,
			'product_id' => request('id')
		]);	
		return back();
	}
}
