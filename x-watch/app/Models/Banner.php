<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Banner
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $title
 * @property int $slost
 * @property int $status
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $url
 * @property int $position
 * [/auto-gen-property]
 *
 */
class Banner extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'banner_hompage';

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
        'name',
        'path',
        'title',
        'slost',
        'status',
        'type',
        'url',
        'position' ,
        # [/auto-gen-attribute]
    ];
}
