<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateProductFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            'uuid' => ['nullable'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'name' => [
                'required','string','max:255',
                Rule::unique('products', 'name')->ignore($this->route('product'))
            ],
            'slug' => [
                'required','string','max:255',
                Rule::unique('products', 'slug')->ignore($this->route('product'))
            ],
            'status' => ['required'],
            'is_trending' => ['required'],
            'is_active' => ['required'],
            'small_description' => ['required'],
            'description' => ['required'],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'image' => ['nullable'],
            'quantity' => [
                'required',
                'integer'
            ],
            'meta_title' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keywords' => ['nullable'],
        ];
    }
    protected function prepareForValidation(): void
    {
        // Prepare the data before validation
        $this->merge([
            //'uuid' => (string) Str::uuid(),
            // El slug es obligatorio, pero ignoramos el id actual si estamos editando
            'slug' => Str::slug($this->name),
            'is_trending' => $this->is_trending == true ? 1 : 0,
            'is_active' => $this->is_active == true ? 1 : 0,

        ]);
    }
}
