<?php

namespace App\Http\Requests\Review;

use App\Http\Requests\FormRequest;

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
 */
class ReviewRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'entity_id' => '',
            'entity_type' => '',
            'status' => '',
            'content' => '',
            'created_at' => '',
            'updated_at' => '',
            'user_id' => '',
            'rating' => '',
            'deleted_at' => ''
        ];
    }
}