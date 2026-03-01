<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_email' => 'required|email',
            'client_password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'client_email.required' => 'البريد الإلكتروني مطلوب.',
            'client_email.email' => 'يجب أن يكون البريد الإلكتروني صحيحاً.',
            'client_password.required' => 'كلمة المرور مطلوبة.',
            'client_password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل.',
        ];
    }
}
