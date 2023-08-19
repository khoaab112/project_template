<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CategoryFilterPrice
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $category_id
 * @property int $from_price
 * @property int $to_price
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class CategoryFilterPrice extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'category_price_filters';

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
        'category_id',
        'from_price',
        'to_price' ,
        # [/auto-gen-attribute]
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'category_id' => 'integer',
        'from_price' => 'integer',
        'to_price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required|integer',
        'from_price' => 'required|integer',
        'to_price' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
