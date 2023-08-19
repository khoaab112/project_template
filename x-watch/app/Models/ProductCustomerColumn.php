<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductCustomerColumn
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_type
 * @property string $cloumn_name
 * @property string $cloumn_code
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductCustomerColumn extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_customer_columns';

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
        'product_type',
        'cloumn_name',
        'cloumn_code' ,
        # [/auto-gen-attribute]
    ];
}
