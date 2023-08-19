<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property int $star
 * @property string $slug
 * @property string $deleted_at
 * @property int $category_blog_id
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class BlogRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'title' => '',
            'star' => '',
            'slug' => '',
            'deleted_at' => '',
            'category_blog_id' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}