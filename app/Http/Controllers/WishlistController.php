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
		$user_id = auth()->user()->id;
		$product_id = Input::get('product_id');

		$count = WishlistProduct::where('product_id', '=', $product_id)->where('user_id','=',$user_id)->count();

		if($count){

         return redirect()->route('index')->with('error','The book already in your cart.');
       	}

		WishlistProduct::create([
			'user_id' => $user_id,
			'product_id' => $product_id
		]);	
		
		$wishlist = WishlistProduct::all()->where('user_id', '=', $user_id);

		return view('products.wishlist', compact('wishlist'));
	}

	public function index()
	{
		$user_id = auth()->user()->id;
		$wishlist = WishlistProduct::all()->where('user_id', '=', $user_id);

		return view('products.wishlist', compact('wishlist'));
	}

	public function delete($id) 
	{
		WishlistProduct::find($id)->delete();
		$user_id = auth()->user()->id;
		$wishlist = WishlistProduct::all()->where('user_id', '=', $user_id)->get();

		return view('products.wishlist', compact('wishlist'));
	}
}
