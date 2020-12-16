<?php

namespace App\Models;

use App\Models\Base\Order as BaseOrder;

class Order extends BaseOrder
{
	protected $fillable = [
		'product_id',
		'order_number',
		'email',
		'billing_name',
		'billing_address',
		'billing_city',
		'billing_state',
		'billing_zip',
		'billing_country',
		'shipping_name',
		'shipping_address',
		'shipping_city',
		'shipping_state',
		'shipping_zip',
		'shipping_country',
		'onetimeurl'
	];
}
