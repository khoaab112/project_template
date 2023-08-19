<?php

namespace App\Http\Requests\Brand;

use App\Http\Requests\FormRequest;
use App\Models\Brand;

class BrandRequest extends FormRequest
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
        return Brand::$rules;
    }
}
