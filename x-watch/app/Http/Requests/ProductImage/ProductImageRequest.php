<?php

namespace App\Http\Requests\ProductImage;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $path
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $name_root
 * @property string $path_root
 * @property int $cron_date
 * [/auto-gen-property]
 */
class ProductImageRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'name' => '',
            'path' => '',
            'type' => '',
            'created_at' => '',
            'updated_at' => '',
            'name_root' => '',
            'path_root' => '',
            'cron_date' => ''
        ];
    }
}