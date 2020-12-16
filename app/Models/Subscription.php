<?php

namespace App\Models;

use App\Models\Base\Subscription as BaseSubscription;

class Subscription extends BaseSubscription
{
	protected $fillable = [
		'user_id',
		'name',
		'stripe_id',
		'stripe_status',
		'stripe_plan',
		'quantity',
		'trial_ends_at',
		'ends_at'
	];
}
