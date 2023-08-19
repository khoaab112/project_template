<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Review
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $entity_id
 * @property int $entity_type
 * @property int $status
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $user_id
 * @property int $rating
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class Review extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'reviews';

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

    const REVIEW_STATUS_DISABLE = -1;
    const REVIEW_STATUS_PENDING = 1;
    const REVIEW_STATUS_ACTIVE = 2;

    public static $aryReviewStatus = [
        self::REVIEW_STATUS_ACTIVE => "Active",
        self::REVIEW_STATUS_PENDING => "Pending",
        self::REVIEW_STATUS_DISABLE => "Disable"
    ];

    public static $aryReviewEntity = [
        self::REVIEW_ENTITY_TYPE_PRODUCT => "Product",
        self::REVIEW_ENTITY_TYPE_CATEGORY => "Category",
    ];

    protected $fillable = [
        # [auto-gen-attribute]
        'entity_id',
        'entity_type',
        'status',
        'content',
        'user_id',
        'rating' ,
        # [/auto-gen-attribute]
    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const REVIEW_ENTITY_TYPE_CATEGORY = 1;
    const REVIEW_ENTITY_TYPE_PRODUCT = 2;

    const RATE_5 = 5;

}
