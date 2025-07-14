<?php

namespace App\Http\Requests\CartItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cart_id'     => 'required|exists:carts,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'sometimes|integer|min:1',
            'unit_price'  => 'sometimes|integer|min:0',
            'total_price' => 'sometimes|integer|min:0',
        ];
    }
}
