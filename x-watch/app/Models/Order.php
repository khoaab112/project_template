<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Order
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property string $phone_number
 * @property int $province_id
 * @property int $district_id
 * @property string $address
 * @property string $description
 * @property int $amount
 * @property int $real_amount
 * @property int $created_by
 * @property int $status
 * @property int $payment_method
 * @property int $payment_status
 * @property int $type
 * @property string $deleted_at
 * @property string $email
 * @property string $affiliate_user
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Order extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order';

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
        'user_id',
        'user_name',
        'phone_number',
        'province_id',
        'district_id',
        'address',
        'description',
        'amount',
        'real_amount',
        'created_by',
        'status',
        'payment_method',
        'payment_status',
        'type',
        'email',
        'affiliate_user' ,
        # [/auto-gen-attribute]
    ];
}
