<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),

            'phone' => 'nullable|string|max:20',

            'address' => 'nullable|string|max:500',

            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [

            'name.required' => 'Name is required.',

            'email.required' => 'Email is required.',

            'email.unique' => 'This email is already taken.',

            'profile_image.image' => 'Please upload a valid image.',

            'profile_image.mimes' => 'Image must be JPG, JPEG or PNG.',

            'profile_image.max' => 'Image size must not exceed 2MB.',

        ];
    }
}