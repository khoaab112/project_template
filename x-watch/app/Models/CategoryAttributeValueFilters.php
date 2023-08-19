<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CategoryAttributeValueFilters
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $category_attribute_filter_id
 * @property int $position
 * @property int $attribute_value_id
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class CategoryAttributeValueFilters extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'category_attribute_value_filters';

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
        'category_attribute_filter_id',
        'position',
        'attribute_value_id' ,
        # [/auto-gen-attribute]
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_attribute_filter_id' => 'required|integer',
        'attribute_value_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function attributeValue()
    {
        return $this->hasOne(AttributeValue::class, "id", "attribute_value_id");
    }
}
