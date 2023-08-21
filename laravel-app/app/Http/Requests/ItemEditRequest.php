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
            'txtPrice' => 'required|integer'
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
        ];
    }
}