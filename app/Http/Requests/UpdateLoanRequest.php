<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanRequest extends FormRequest
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
            'somitee_id' => 'required|exists:somitees,id',
            'member_id' => 'required|exists:members,id',
            'loan_amount' => 'required|numeric|min:0',
            'interest' => 'required|numeric|min:0|max:100',
            'total_payable' => 'required|numeric|min:0',
            'loan_type' => 'required|in:Weekly,Monthly',
            'installment' => 'required|numeric|min:0',
            'status' => 'nullable|string|in:pending,approved,rejected,completed',
        ];
    }
}