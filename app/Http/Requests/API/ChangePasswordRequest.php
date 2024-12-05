<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'password' => ['required', 'string','confirmed', 'min:8', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
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
}
