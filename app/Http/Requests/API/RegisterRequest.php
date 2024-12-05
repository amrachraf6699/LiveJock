<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guest();
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
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:255|unique:users,phone',
            'password' => ['required', 'string', 'min:8', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            SendResponse(422, "The data you've passed isn't validated", $validator->errors())
        );
    }

    /**
     * Handle a validation messages
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'You\'re aleady registered with this email',
            'phone.unique' => 'You\'re aleady registered with this phone number',
        ];
    }
}
