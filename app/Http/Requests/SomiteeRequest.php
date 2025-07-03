<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SomiteeRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'employee_id' => 'required|integer|exists:employees,id',
            'branch_id'   => 'required|integer|exists:branches,id',
            'somitee_day' => 'required|string|max:50',
            'date'  => 'required|date_format:m/d/Y',
            'description' => 'nullable|string',
        ];
    }
}
