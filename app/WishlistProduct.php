<?php

namespace App;

class WishlistProduct extends Model
{
	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
