<?php

namespace App\Http\Requests\AttributeValue;

use App\Http\Requests\FormRequest;
use App\Models\AttributeValue;

class CreateAttributeValueRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return AttributeValue::$rules;
    }
}
