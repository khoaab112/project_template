<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PageNews
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $path
 * @property string $title
 * @property string $comment
 * @property int $slost
 * @property int $status
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class PageNews extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'blog_news';

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
        'url',
        'path',
        'title',
        'comment',
        'slost',
        'status',
        'type' ,
        # [/auto-gen-attribute]
    ];
}
