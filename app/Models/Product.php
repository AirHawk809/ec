<?php

namespace App\Models;

use App\Models\Base\Product as BaseProduct;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseProduct
{
  use SoftDeletes;

  protected $fillable = [
		'sku',
		'name',
		'description',
		'price',
		'is_downloadble'
  ];

  protected $dates = ['deleted_at'];
}
