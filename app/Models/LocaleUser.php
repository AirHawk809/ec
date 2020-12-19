<?php

namespace App\Models;

use App\Models\Base\LocaleUser as BaseLocaleUser;

class LocaleUser extends BaseLocaleUser
{
	protected $fillable = [
		'locale_id',
		'user_id'
	];
}
