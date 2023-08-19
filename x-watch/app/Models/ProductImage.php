<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductImage
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $path
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $name_root
 * @property string $path_root
 * @property int $cron_date
 * [/auto-gen-property]
 *
 */
class ProductImage extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_images';

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
        'name',
        'path',
        'type',
        'name_root',
        'path_root',
        'cron_date' ,
        # [/auto-gen-attribute]
    ];
}
