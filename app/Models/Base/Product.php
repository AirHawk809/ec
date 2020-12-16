<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property float $price
 * @property bool $is_downloadble
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models\Base
 */
class Product extends Model
{
	use SoftDeletes;
	protected $table = 'products';

	protected $casts = [
		'price' => 'float',
		'is_downloadble' => 'bool'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
