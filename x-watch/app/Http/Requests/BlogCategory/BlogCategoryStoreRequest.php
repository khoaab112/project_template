<?php

namespace App\Http\Requests\BlogCategory;

class BlogCategoryStoreRequest extends BlogCategoryRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'title' => 'required|string|max:255',
            'parent_id' => 'nullable|max:255',

            'slug' => 'nullable|string|max:255',
            'default_img' => 'nullable|string|max:255',
            'deleted_at' => 'nullable|string',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string'
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
