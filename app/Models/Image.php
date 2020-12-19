<?php

namespace App\Models;

use App\Models\Base\Image as BaseImage;

class Image extends BaseImage
{
	protected $fillable = [
		'user_id',
		'product_id',
		'name'
	];
}
