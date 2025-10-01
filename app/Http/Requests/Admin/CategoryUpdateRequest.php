<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Implement authorization
        // Check if user is authenticated and has admin role
        return true; // Temporarily allow all for testing
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // TODO: Implement validation rules for updating categories
        // Get current category ID from route

        return [
              "name"=> "string|unique:categories,name|sometimes",
            "parent_id"=> "nullable|exists:categories,id",
            // TODO: Add validation rules here
        ];
    }
}
