<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\WishlistProduct;
use Illuminate\Support\Facades\Input;

class WishlistController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store()
	{
		$user = auth()->user();
		$product = $user->wishlist;
		
		$count = WishlistProduct::where('product_id', '=', $product->product_id)->where('user_id','=',$user->id)->count();

		if($count){
			return back();
       	}

		WishlistProduct::create([
			'user_id' => $user->id,
			'product_id' => $product->id
		]);	
		
		$wishlist = WishlistProduct::where('user_id', '=', $user->id);
		dd($wishlist);
		return view('products.wishlist', compact('wishlist'));
	}

	public function index()
	{
		$user = auth()->user();
		$wishlist = WishlistProduct::where('user_id', '=', $user->id)->get();
		$products = array();

		foreach ($wishlist as $key => $value) {
			$product = new Product;
			$product = json_decode($value['product_id'], true);
			$products[] = $product;
		}

		return view('products.wishlist', compact('products'));
	}

	public function delete($id) 
	{
		WishlistProduct::find($id)->delete();
		$user = auth()->user();
		$wishlist = WishlistProduct::where('user_id', '=', $user->id)->get();

		return view('products.wishlist', compact('wishlist'));
	}
}
