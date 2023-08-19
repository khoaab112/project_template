<?php

namespace App\Http\Requests\ProductVariant;

class ProductVariantStoreRequest extends ProductVariantRequest
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
            'name' => 'required|string|max:250',
            'slug' => 'required|string|max:250',
            'sku' => 'required|string|max:30',
            'price' => 'required|integer',
            'compare_price' => 'required|integer',
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