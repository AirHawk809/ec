<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Image;
use App\Models\Locale;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $stripe_subscription
 * @property string|null $stripe_plan
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property Carbon|null $trial_ends_at
 * @property bool $is_admin
 * 
 * @property Collection|Image[] $images
 * @property Collection|Locale[] $locales
 * @property Collection|Order[] $orders
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'is_admin' => 'bool'
	];

	protected $dates = [
		'email_verified_at',
		'trial_ends_at'
	];

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function locales()
	{
		return $this->belongsToMany(Locale::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
