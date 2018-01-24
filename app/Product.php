<?php

namespace App;

class Product extends Model
{
	public function wishlist()
	{
		return $this->belongsTo(WishlistProduct::class);
	}
}
