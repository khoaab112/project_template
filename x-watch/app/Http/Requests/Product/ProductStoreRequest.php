<?php

namespace App\Http\Requests\Product;

class ProductStoreRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'name' => 'required|string|max:255',
            'price' => 'required',
            'status' => 'required|integer',
            'description' => 'nullable',
            'default_img' => 'array',
            'type' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'sync_seo_content' => 'integer',
            'deleted_at' => 'nullable|string',
            'video_url' => 'nullable'
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
