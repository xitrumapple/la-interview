<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName' => 'required|unique:cates,cate_name'
        ];
    }

    public function messages(): array
    {
        return [
            'txtCateName.required' => 'Please Enter Category Name.',
            'txtCateName.unique' => 'Category Name has already exists.',
        ];
    }
}