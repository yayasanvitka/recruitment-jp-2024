<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'bail|required|unique:products,code',
            'name' => 'bail|required',
            'category_id' => 'bail|required|exists:categories,id', 
            'supplier_id' => 'bail|required|exists:suppliers,id',
        ];
    }
}
