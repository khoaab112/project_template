<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TotalReview
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $entity_id
 * @property int $entity_type
 * @property int $total_rating
 * @property int $total_user
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class TotalReview extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'total_reviews';

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
        'entity_id',
        'entity_type',
        'total_rating',
        'total_user' ,
        # [/auto-gen-attribute]
    ];
}
