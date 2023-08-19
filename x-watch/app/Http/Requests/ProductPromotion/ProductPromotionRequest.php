<?php

namespace App\Http\Requests\ProductPromotion;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_variant_id
 * @property string $product_variant_sku
 * @property int $discount_percent
 * @property int $discount_amount
 * @property int $base_price
 * @property int $promotion_price
 * @property int $status
 * @property int $confirm_status
 * @property int $start_date
 * @property int $end_date
 * @property int $cron_status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductPromotionRequest extends FormRequest
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
            'product_variant_sku' => '',
            'discount_percent' => '',
            'discount_amount' => '',
            'base_price' => '',
            'promotion_price' => '',
            'status' => '',
            'confirm_status' => '',
            'start_date' => '',
            'end_date' => '',
            'cron_status' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}