<?php

namespace App\Http\Requests\ProductFlashSale;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductFlashSaleRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'description' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}