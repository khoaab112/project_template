<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderVoucher
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $order_id
 * @property int $voucher_id
 * @property int $voucher_discount_type
 * @property int $voucher_discount_value
 * @property int $voucher_created_by
 * @property int $voucher_start_date
 * @property int $voucher_end_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class OrderVoucher extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order_vouchers';

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
        'voucher_id',
        'voucher_discount_type',
        'voucher_discount_value',
        'voucher_created_by',
        'voucher_start_date',
        'voucher_end_date' ,
        # [/auto-gen-attribute]
    ];
}
