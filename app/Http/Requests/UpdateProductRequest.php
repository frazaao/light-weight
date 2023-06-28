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
            Product::NAME => ['required', 'string'],
            Product::CALORIES => ['required', 'numeric'],
            Product::PROTEINS => ['required', 'numeric'],
            Product::CARBS => ['required', 'numeric'],
            Product::LIPIDS => ['required', 'numeric'],
        ];
    }
}
