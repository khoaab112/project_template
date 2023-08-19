<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderItem
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property int $price
 * @property int $promotion_id
 * @property int $promotion_discount
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class OrderItem extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order_items';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'order_id',
        'product_id',
        'product_variant_id',
        'quantity',
        'price',
        'promotion_id',
        'promotion_discount' ,
        # [/auto-gen-attribute]
    ];
}
