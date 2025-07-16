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
            'member_id' => 'required|exists:members,id',
            'somitee_id' => 'required|exists:somitees,id',
            'loan_amount' => 'required|numeric|min:0',
            'loan_purpose' => 'required|string|max:255',
            'status' => 'required|string|in:pending,approved,rejected,completed',
            'day_id' => 'required|exists:days,id',
        ];
    }
}