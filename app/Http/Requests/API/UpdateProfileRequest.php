<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:255|unique:users,phone,' . auth()->id(),
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
            'email.unique' => 'This email is already in user',
            'phone.unique' => 'This phone is already in user',
        ];
    }
}
