<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CateEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtCateName' => 'required|unique:cates,cate_name',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'txtCateName.required' => 'Please Enter Category Name.',
            'txtCateName.unique' => 'Category Name has already exists.',
            'image.mimes' => 'Image must be jpeg,png,jpg,gif',
            'image.size' => 'Image Size is only 2MB'
        ];
    }
}