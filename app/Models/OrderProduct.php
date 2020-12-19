<?php

namespace App\Models;

use App\Models\Base\OrderProduct as BaseOrderProduct;

class OrderProduct extends BaseOrderProduct
{
	protected $fillable = [
		'order_id',
		'product_id'
	];
}
