<?php

namespace App\Models;

use App\Models\Base\Locale as BaseLocale;

class Locale extends BaseLocale
{
	protected $fillable = [
		'zip',
		'address',
		'city',
		'state',
		'country',
		'phone_number'
	];
}
