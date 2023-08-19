<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductLabel
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $label_id
 * @property int $time_start
 * @property int $time_end
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductLabel extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_labels';

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
        'label_id',
        'time_start',
        'time_end' ,
        # [/auto-gen-attribute]
    ];
}
