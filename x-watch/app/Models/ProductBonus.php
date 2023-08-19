<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductBonus
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_bonus_id
 * @property string $product_sku
 * @property string $product_bonus_sku
 * @property int $bonus_qty
 * @property int $time_start
 * @property int $time_end
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductBonus extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_bonus';

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
        'product_id',
        'product_bonus_id',
        'product_sku',
        'product_bonus_sku',
        'bonus_qty',
        'time_start',
        'time_end' ,
        # [/auto-gen-attribute]
    ];
}
