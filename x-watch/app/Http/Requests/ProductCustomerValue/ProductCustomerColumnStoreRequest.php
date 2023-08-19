<?php

namespace App\Http\Requests\ProductCustomerValue;

class ProductCustomerColumnStoreRequest extends ProductCustomerColumnRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'product_type' => 'required|integer',
            'cloumn_name' => 'required|string|max:255',
            'cloumn_code' => 'required|string|max:255',
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
