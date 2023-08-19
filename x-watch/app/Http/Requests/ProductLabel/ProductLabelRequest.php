<?php

namespace App\Http\Requests\ProductLabel;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $label_id
 * @property int $time_start
 * @property int $time_end
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductLabelRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'label_id' => '',
            'time_start' => '',
            'time_end' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}