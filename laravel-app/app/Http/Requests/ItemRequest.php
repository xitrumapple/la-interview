<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'txtItemName' => 'required|unique:items,item_name',
            'sltCate' => 'required',
            'sltUnit' => 'required',
            'txtPrice' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'txtItemName.required' => 'Please Enter Item Name.',
            'txtItemName.unique' => 'Item Name has already exists.',
            'sltCate.required' => 'Please Choose Category.',
            'sltUnit.required' => 'Please Choose Unit.',
            'txtPrice.required' => 'Please Enter Price.',
            'txtPrice.integer' => 'Price must be integer.',
            'image.required' => 'Please upload image.',
            'image.mimes' => 'Image must be jpeg,png,jpg,gif',
            'image.size' => 'Image Size is only 2MB',
        ];
    }
}