<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Locale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocaleUser
 * 
 * @property int $id
 * @property int $locale_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Locale $locale
 * @property User $user
 *
 * @package App\Models\Base
 */
class LocaleUser extends Model
{
	protected $table = 'locale_user';

	protected $casts = [
		'locale_id' => 'int',
		'user_id' => 'int'
	];

	public function locale()
	{
		return $this->belongsTo(Locale::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
