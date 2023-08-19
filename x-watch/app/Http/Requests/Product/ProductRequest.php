<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $sku
 * @property string $name
 * @property string $slug
 * @property int $price
 * @property int $compare_price
 * @property int $status
 * @property string $description
 * @property string $default_img
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property int $sync_seo_content
 * @property int $promotion_price
 * @property int $product_promotion_id
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'sku' => '',
            'name' => '',
            'slug' => '',
            'price' => '',
            'compare_price' => '',
            'status' => '',
            'description' => '',
            'default_img' => '',
            'type' => '',
            'created_at' => '',
            'updated_at' => '',
            'sync_seo_content' => '',
            'promotion_price' => '',
            'product_promotion_id' => '',
            'deleted_at' => ''
        ];
    }
}