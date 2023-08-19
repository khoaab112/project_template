<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductAttributeValueImage
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_attribute_value_id
 * @property string $path
 * @property string $file_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductAttributeValueImage extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_attribute_value_images';

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
        'product_attribute_value_id',
        'path',
        'file_name' ,
        # [/auto-gen-attribute]
    ];
}
