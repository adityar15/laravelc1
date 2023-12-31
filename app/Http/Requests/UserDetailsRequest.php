<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsRequest extends FormRequest
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
            "name" => ['required', 'string'],
            "email" => ['required', 'email:rfc,dns', 'unique:users,email'],
            "password" => ['required', 'min:6', 'max:12']
        ];
    }

    // select email from users where email = ? ('aditya@example.com') limit 1

    public function messages() : array
    {
        return [
            "email.required" => "Please enter your email",
            "email.email" => "Please enter a valid email address"
        ];
    }
}
