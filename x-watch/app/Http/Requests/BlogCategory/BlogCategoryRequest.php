<?php

namespace App\Http\Requests\BlogCategory;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $default_img
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class BlogCategoryRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'title' => '',
            'slug' => '',
            'parent_id' => '',
            'default_img' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}
