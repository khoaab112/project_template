<?php

namespace App\Http\Requests\Review;

class ReviewStoreRequest extends ReviewRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'entity_id' => 'required|integer',
            'entity_type' => 'required|integer',
            'status' => 'required|integer',
            'content' => 'required|string|max:500',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'user_id' => 'required|string|max:255',
            'rating' => 'required|integer',
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
