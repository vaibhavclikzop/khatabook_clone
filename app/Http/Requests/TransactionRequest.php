<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:255',
            'transaction_date' => 'required|date',
            'customer_id' => 'required|integer|exists:customers,id',
            'type' => 'required|string',
            'payment_mode' => 'required|string',
            'ref_id' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ];
    }
}
