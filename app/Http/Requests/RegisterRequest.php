<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:10','max:255'],
            'email' => ['required','email'],
            'telephone'=>['required','min:8','max:20'],
            'password' => ['required', 'min:5','confirmed'],
            'password_confirmation'=>['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'This field is required',
            '*.email' => 'This field must be a valid email address',
            'password.min' => 'This field must be more than 5 characters',
            'password.confirmed' => 'Password and password confirmation do not match',
        ];
    }
}
