<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemEditRequest extends FormRequest
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
            'txtItemName' => 'required',
            'sltCate' => 'required',
            'sltUnit' => 'required',
            'txtPrice' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'txtItemName.required' => 'Please Enter Item Name.',
            'sltCate.required' => 'Please Choose Category.',
            'sltUnit.required' => 'Please Choose Unit.',
            'txtPrice.required' => 'Please Enter Price.',
            'txtPrice.integer' => 'Price must be integer.',
            'image.mimes' => 'Image must be jpeg,png,jpg,gif',
            'image.size' => 'Image Size is only 2MB',
        ];
    }
}