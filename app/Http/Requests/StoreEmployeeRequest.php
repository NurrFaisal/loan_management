<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set to false if only authorized users should be allowed
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address'     => 'required|string|max:500',
            'nid'         => 'required|digits_between:10,17|unique:employees,nid',
            'phone'       => 'required|string|regex:/^01[3-9]\d{8}$/|unique:employees,phone',
            'salary'      => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'The name field is required.',
            'father_name.required'  => 'The father\'s name is required.',
            'address.required'      => 'The address field is required.',
            'nid.required'          => 'The NID field is required.',
            'nid.digits_between'    => 'The NID must be between 10 and 17 digits.',
            'nid.unique'            => 'This NID already exists.',
            'phone.required'        => 'The phone number is required.',
            'phone.regex'           => 'The phone number format is invalid.',
            'phone.unique'          => 'This phone number already exists.',
            'salary.required'       => 'The salary field is required.',
            'salary.numeric'        => 'The salary must be a number.',
            'salary.min'            => 'The salary must be at least 0.',
        ];
    }
}
