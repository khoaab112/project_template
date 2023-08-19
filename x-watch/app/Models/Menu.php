<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Menu
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $position
 * @property string $url
 * @property string $class_name
 * @property string $id_name
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Menu extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'menus';

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
        'parent_id',
        'name',
        'position',
        'url',
        'class_name',
        'id_name' ,
        # [/auto-gen-attribute]
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'integer',
        'name' => 'required|string|max:255',
    ];
}
