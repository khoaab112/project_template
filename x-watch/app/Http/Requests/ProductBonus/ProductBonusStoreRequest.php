<?php

namespace App\Http\Requests\ProductBonus;

class ProductBonusStoreRequest extends ProductBonusRequest
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
            'product_bonus_id' => 'required|integer',
            'product_sku' => 'required|string|max:20',
            'product_bonus_sku' => 'required|string|max:20',
            'bonus_qty' => 'required|integer',
            'time_start' => 'required|integer',
            'time_end' => 'required|integer',
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
