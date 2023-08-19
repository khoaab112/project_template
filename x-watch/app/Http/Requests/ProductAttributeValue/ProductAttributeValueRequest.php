<?php

namespace App\Http\Requests\ProductAttributeValue;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_variant_id
 * @property int $attribute_value_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductAttributeValueRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'product_variant_id' => '',
            'attribute_value_id' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}