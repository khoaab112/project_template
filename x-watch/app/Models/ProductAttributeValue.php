<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductAttributeValue
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_variant_id
 * @property int $attribute_value_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductAttributeValue extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_attribute_values';

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
        'product_variant_id',
        'attribute_value_id' ,
        # [/auto-gen-attribute]
    ];

    public static $rules = [
        'product_id' => 'required|integer',
        'product_variant_id' => 'integer',
        'attribute_value_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public function variant()
    {
        return $this->hasOne(ProductVariant::class, "id", "product_variant_id");
    }

    public function attributeValue()
    {
        return $this->hasOne(AttributeValue::class, "id", "attribute_value_id");
    }

    public function productAttributeValueImage()
    {
        return $this->hasOne(ProductAttributeValueImage::class, "product_attribute_value_id", "id");
    }

    public function productImage()
    {
        return $this->hasOne(ProductImage::class, "id", "product_image_id");
    }
}
