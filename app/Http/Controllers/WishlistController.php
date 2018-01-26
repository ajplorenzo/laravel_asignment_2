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
		$product = json_decode(request('product'));
		
		$count = WishlistProduct::where('product_id', '=', $product->id)->where('user_id','=',$user->id)->count();

		if($count){
			return back();
       	}

		/*WishlistProduct::create([
			'user_id' => $user->id,
			'product_id' => json_encode($product)
		]);	
		
		$wishlist = WishlistProduct::where('user_id', '=', $user->id)->get();
		$products = array();

		foreach ($wishlist as $key => $value) {
			$product = new Product;
			$product = json_decode($value['product_id'], true);
			$products[] = $product;
		}*/

		WishlistProduct::create([
			'user_id' => $user->id,
			'product_id' => $product->id
		]);	
		
		$wishlist = WishlistProduct::where('user_id', '=', $user->id)->get();
		$products = array();

		foreach ($wishlist as $item) {
			$product_id = $item['product_id'];
			$product = Product::where('id', '=', $product_id)->get();
			$products[] = $product[0];
		}

		return view('products.wishlist', compact('products'));
	}

	public function index()
	{
		$user = auth()->user();
		$wishlist = WishlistProduct::where('user_id', '=', $user->id)->get();
		$products = array();

		/*foreach ($wishlist as $key => $value) {
			$product = new Product;
			$product = json_decode($value['product_id'], true);
			$products[] = $product;
		}*/

		foreach ($wishlist as $item) {
			$product_id = $item['product_id'];
			$product = Product::where('id', '=', $product_id)->get();
			$products[] = $product[0];
		}

		return view('products.wishlist', compact('products'));
	}

	public function delete() 
	{
		$product_id = request('product_id');
		WishlistProduct::where('product_id', '=', $product_id)->delete();
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
}
