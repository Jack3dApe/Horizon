<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'card_number' => ['required', 'digits:16'],
            'name_on_card' => ['required', 'string', 'min:2'],
            'expiry_date' => ['required', 'regex:/^\d{2}\/\d{2}$/', 'after_or_equal:today'],
            'cvv' => ['required', 'digits:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'card_number.required' => 'Card number is required.',
            'card_number.digits' => 'Card number must be exactly 16 digits.',
            'name_on_card.required' => 'Name on card is required.',
            'name_on_card.min' => 'Name on card must be at least 2 characters long.',
            'expiry_date.regex' => 'Expiry date format must be MM/YY.',
            'cvv.digits' => 'CVV code must be exactly 3 digits.',
        ];
    }
}
