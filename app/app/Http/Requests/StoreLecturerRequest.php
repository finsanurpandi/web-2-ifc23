<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Nidn;

class StoreLecturerRequest extends FormRequest
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
            'username' => ['min:8'],
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'department_id' => 'required',
            'nidn' => ['required', 'digits:10', new Nidn],
            'address' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'username.min' => 'NPM harus terdiri dari minimal 10 digit',
        ];
    }
}
