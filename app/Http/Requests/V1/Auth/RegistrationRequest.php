<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\Abstract\AbstractRequest;

class RegistrationRequest extends AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'regex:/\w*$/', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'max:255', 'min:8'],
        ];
    }
}
