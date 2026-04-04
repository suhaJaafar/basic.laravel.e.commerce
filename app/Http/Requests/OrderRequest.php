<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     * This handles comma-separated values in array elements.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('product_ids') && is_array($this->product_ids)) {
            $productIds = [];

            foreach ($this->product_ids as $item) {
                // Handle comma-separated string values
                if (is_string($item) && str_contains($item, ',')) {
                    $exploded = array_map('trim', explode(',', $item));
                    $productIds = array_merge($productIds, $exploded);
                } else {
                    $productIds[] = $item;
                }
            }

            // Convert all values to integers and remove duplicates
            $productIds = array_values(array_unique(array_map('intval', $productIds)));

            $this->merge([
                'product_ids' => $productIds,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => ['required', 'integer', 'min:1'],
            'user_id' => ['required', 'exists:users,id'],
            'product_ids' => ['required', 'array', 'min:1'],
            'product_ids.*' => ['required', 'integer', 'exists:products,id'],
        ];
    }
}
