<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            Product::NAME => ['required', 'string'],
            Product::CALORIES => ['required', 'float'],
            Product::PROTEINS => ['required', 'float'],
            Product::CARBS => ['required', 'float'],
            Product::LIPIDS => ['required', 'float'],
        ];
    }
}
