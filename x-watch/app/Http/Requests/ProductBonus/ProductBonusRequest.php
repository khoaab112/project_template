<?php

namespace App\Http\Requests\ProductBonus;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_bonus_id
 * @property string $product_sku
 * @property string $product_bonus_sku
 * @property int $bonus_qty
 * @property int $time_start
 * @property int $time_end
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductBonusRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'product_bonus_id' => '',
            'product_sku' => '',
            'product_bonus_sku' => '',
            'bonus_qty' => '',
            'time_start' => '',
            'time_end' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}