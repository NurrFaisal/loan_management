<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'somitee_id'         => 'required|exists:somitees,id',
            'member_id'          => 'required|exists:members,id',
            'day_id'             => 'required|integer',
            'loan_amount'        => 'required|numeric|min:1',
            'interest'           => 'required|numeric|min:0|max:100',
            'total_loan'         => 'required|numeric|min:1',
            'type'               => 'required|string|max:50',
            'installment'        => 'required|integer|min:1',
            'installment_amount' => 'required|numeric|min:1',
        ];
    }
}
