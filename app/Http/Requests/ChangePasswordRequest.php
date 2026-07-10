<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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

            'current_password' => 'required',

            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).+$/'
            ],

        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [

            'current_password.required' => 'Current password is required.',

            'new_password.required' => 'New password is required.',

            'new_password.min' => 'Password must be at least 8 characters.',

            'new_password.confirmed' => 'Passwords do not match.',

            'new_password.regex' =>
                'Password must contain uppercase, lowercase and a number.',

        ];
    }
}