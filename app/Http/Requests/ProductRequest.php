<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:50',
            'product_qty' => 'required|integer|min:0',
            'selling_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'short_descp' => 'string|max:500',
            'special_deals' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ];
    }
}
