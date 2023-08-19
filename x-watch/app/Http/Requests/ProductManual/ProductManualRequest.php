<?php

namespace App\Http\Requests\ProductManual;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class ProductManualRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'title' => '',
            'content' => '',
            'slug' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}