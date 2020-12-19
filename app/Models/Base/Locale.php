<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Locale
 * 
 * @property int $id
 * @property int $zip
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int|null $phone_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Locale extends Model
{
	protected $table = 'locales';

	protected $casts = [
		'zip' => 'int',
		'phone_number' => 'int'
	];

	public function users()
	{
		return $this->belongsToMany(User::class)
					->withPivot('id')
					->withTimestamps();
	}
}
