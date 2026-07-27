<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:255',

            'sku' => 'required|string|max:100|unique:products,sku',

            'description' => 'nullable|string|max:2000',

            'price' => 'required|numeric|min:0',

            'quantity' => 'required|integer|min:0',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'status' => 'required|boolean',
        ];
    }

    /**
     * Custom Error Messages
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'Selected category is invalid.',

            'name.required' => 'Product name is required.',

            'sku.required' => 'SKU is required.',
            'sku.unique' => 'SKU already exists.',

            'price.required' => 'Product price is required.',
            'price.numeric' => 'Price must be a number.',

            'quantity.required' => 'Quantity is required.',

            'image.image' => 'Please upload a valid image.',
            'image.max' => 'Image size must not exceed 2 MB.',

            'status.required' => 'Please select product status.',
        ];
    }
}