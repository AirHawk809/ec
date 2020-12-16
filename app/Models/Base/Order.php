<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $product_id
 * @property string $order_number
 * @property string $email
 * @property string $billing_name
 * @property string $billing_address
 * @property string $billing_city
 * @property string $billing_state
 * @property string $billing_zip
 * @property string $billing_country
 * @property string|null $shipping_name
 * @property string|null $shipping_address
 * @property string|null $shipping_city
 * @property string|null $shipping_state
 * @property string|null $shipping_zip
 * @property string|null $shipping_country
 * @property string|null $onetimeurl
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 *
 * @package App\Models\Base
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'product_id' => 'int'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
