<?php

namespace App\Models;

use App\Models\Base\SubscriptionItem as BaseSubscriptionItem;

class SubscriptionItem extends BaseSubscriptionItem
{
	protected $fillable = [
		'subscription_id',
		'stripe_id',
		'stripe_plan',
		'quantity'
	];
}
