<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'nid' => 'required|string|max:255|unique:employees,nid,' . $this->employee->id,
            'salary' => 'required|numeric',
            'phone' => 'required|string|max:255|unique:employees,phone,' . $this->employee->id,
            'email' => 'required|string|email|max:255|unique:employees,email,' . $this->employee->id,
            'branch_id' => 'required|exists:branches,id',
        ];
    }
}