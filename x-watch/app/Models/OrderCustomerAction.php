<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderCustomerAction
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $order_id
 * @property string $data_json
 * @property string $created_at
 * @property string $updated_at
 * @property string $browser
 * @property string $city
 * @property string $detect
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class OrderCustomerAction extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order_customer_actions';

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
        'data_json',
        'browser',
        'city',
        'detect' ,
        # [/auto-gen-attribute]
    ];
}
