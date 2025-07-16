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
            'nid' => 'required|string|max:255|unique:members,nid,' . $this->member->id,
            'phone' => 'required|string|max:255|unique:members,phone,' . $this->member->id,
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'somitee_id' => 'required|exists:somitees,id',
            'day_id' => 'required|exists:days,id',
        ];
    }
}