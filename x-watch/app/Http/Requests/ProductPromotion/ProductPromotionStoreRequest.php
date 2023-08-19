<?php

namespace App\Http\Requests\ProductPromotion;

class ProductPromotionStoreRequest extends ProductPromotionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'product_id' => 'required|integer',
            'product_variant_id' => 'required|integer',
            'product_variant_sku' => 'required|string|max:50',
            'discount_percent' => 'required|integer',
            'discount_amount' => 'required|integer',
            'base_price' => 'required|integer',
            'promotion_price' => 'required|integer',
            'status' => 'required|integer',
            'confirm_status' => 'required|integer',
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'cron_status' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'deleted_at' => 'nullable|string'
            # [/auto-gen-rules]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            # messages
        ];
    }
}
