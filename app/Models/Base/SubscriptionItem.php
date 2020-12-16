<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscriptionItem
 * 
 * @property int $id
 * @property int $subscription_id
 * @property string $stripe_id
 * @property string $stripe_plan
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class SubscriptionItem extends Model
{
	protected $table = 'subscription_items';

	protected $casts = [
		'subscription_id' => 'int',
		'quantity' => 'int'
	];
}
