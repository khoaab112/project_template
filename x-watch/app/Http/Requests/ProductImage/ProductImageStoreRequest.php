<?php

namespace App\Http\Requests\ProductImage;

class ProductImageStoreRequest extends ProductImageRequest
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
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:500',
            'type' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'name_root' => 'nullable|string|max:255',
            'path_root' => 'nullable|string|max:255',
            'cron_date' => 'integer'
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
