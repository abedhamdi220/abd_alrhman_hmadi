<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Implement authorization
        // Check if user is authenticated and has provider role
        return true; // Temporarily allow all for testing
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // TODO: Implement validation rules for provider creating services
        // Required fields: name, category_id
        // Optional fields: description, price
        // Validation: valid category_id
        return [
            // TODO: Add validation rules here
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        // TODO: Add custom validation messages
        return [
            // TODO: Add custom messages here
        ];
    }
}
