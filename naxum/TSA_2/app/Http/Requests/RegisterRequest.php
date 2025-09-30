<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:5', 'max:30'],
            'last_name' => ['required', 'string', 'min:5', 'max:30'],
            'phone_number' => ['required', 'digits_between:5,20'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:50'],
        ];
    }
}
