<?php

namespace App\Http\Requests\ProductVariant;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $slug
 * @property string $sku
 * @property int $price
 * @property int $compare_price
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductVariantRequest extends FormRequest
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
            'slug' => '',
            'sku' => '',
            'price' => '',
            'compare_price' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}