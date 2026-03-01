<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ClientRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string|min:3|max:255',
            'client_email' => 'required|string|email|max:255|unique:clients,client_email',
            'client_password' => ['required', 'confirmed', Password::min(6)],
            'role' => 'sometimes|in:admin,client', // للأدمن فقط
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'الاسم مطلوب.',
            'client_name.min' => 'الاسم يجب أن يكون 3 أحرف على الأقل.',
            'client_email.required' => 'البريد الإلكتروني مطلوب.',
            'client_email.email' => 'يجب أن يكون البريد الإلكتروني صحيحاً.',
            'client_email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
            'client_password.required' => 'كلمة المرور مطلوبة.',
            'client_password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        ];
    }
}
