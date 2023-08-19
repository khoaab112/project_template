<?php

namespace App\Http\Requests\ProductAttributeValueImage;

class ProductAttributeValueImageStoreRequest extends ProductAttributeValueImageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'product_attribute_value_id' => 'required|integer',
            'path' => 'required|string|max:1000',
            'file_name' => 'required|string|max:250',
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
