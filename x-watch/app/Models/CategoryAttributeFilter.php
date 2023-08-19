<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CategoryAttributeFilter
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $category_id
 * @property int $attribute_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class CategoryAttributeFilter extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'category_attribute_filters';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    const CATEGORY_IS_ACTIVE = 1;
    const CATEGORY_IS_DISABLE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'category_id',
        'attribute_id' ,
        # [/auto-gen-attribute]
    ];

    public static $rules = [
        'category_id' => 'required|integer',
        'attribute_id' => 'required|integer',
        'position' => 'integer' | 'nullable',
        'status' => 'integer' | 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function attribute(){
        return $this->hasOne(Attribute::class, "id", "attribute_id");
    }

    public function categoryAttributeValues(){
        return $this->hasMany(CategoryAttributeValueFilters::class, "category_attribute_filter_id", "id")->orderBy("position", "ASC");
    }

    public function categories(){
        return $this->hasOne(Category::class, "id", "category_id");
    }
}
