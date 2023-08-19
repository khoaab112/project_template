<?php

namespace App\Http\Requests\CategoryBrand;

use App\Http\Requests\FormRequest;
use App\Models\CategoryBrand;

class CategoryBrandRequest extends FormRequest
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
        return CategoryBrand::$rules;
    }
}
