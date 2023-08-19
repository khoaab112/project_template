<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderItemBonus
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $product_sku
 * @property int $product_bonus_id
 * @property string $product_bonus_sku
 * @property int $bonus_qty
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $name
 * @property string $price
 * @property string $link
 * [/auto-gen-property]
 *
 */
class OrderItemBonus extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order_items_bonus';

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
        'product_sku',
        'product_bonus_id',
        'product_bonus_sku',
        'bonus_qty',
        'name',
        'price',
        'link' ,
        # [/auto-gen-attribute]
    ];
}
