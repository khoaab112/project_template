<?php

namespace App\Http\Requests\Blog;

class BlogStoreRequest extends BlogRequest
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
            'star' => 'integer',
            'slug' => 'nullable|string|max:255',
            'deleted_at' => 'nullable|string',
            'category_blog_id' => 'required|integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'description' => 'nullable',
            'content' => 'nullable',
            'default_image' => 'nullable'
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
