<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'father_husband_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'nid' => 'required|string|max:255|unique:members,nid,' . $this->member->id,
            'phone' => 'required|string|max:255|unique:members,phone,' . $this->member->id,
            'somitee_id' => 'required|exists:somitees,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive,suspended',
            'address' => 'required|string',
            'admission_fee' => 'required|numeric|min:0',
        ];
    }
}