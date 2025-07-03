<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'father_name'   => 'required|string|max:255',
            'gender'        => 'required|in:Male,Female,Other',
            'nid'           => 'required|numeric|digits_between:10,17|unique:members,nid',
            'phone'         => 'required|string|max:20',
            'somitee_id'    => 'required|exists:somitees,id',
            'day_id'        => 'required|integer',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address'       => 'required|string',
            'admission_fee' => 'required|integer|min:0',
            'status'        => 'required|in:0,1',
        ];
    }
}
