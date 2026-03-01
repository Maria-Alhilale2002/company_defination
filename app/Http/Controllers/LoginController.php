<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('client_login');
    }

    public function login(ClientLoginRequest $request)
    {
        $credentials = [
            'client_email' => $request->client_email,
            'password' => $request->client_password, // Laravel يتوقع 'password' كمفتاح
        ];

        if (Auth::guard('client')->attempt($credentials, $request->boolean('remember'))) {

            $client = Auth::guard('client')->user();

            // التحقق إذا الحساب نشط
            if (! $client->isActive()) {
                Auth::guard('client')->logout();

                return redirect()->route('client.login.page')->withErrors([
                    'client_email' => 'هذا الحساب غير نشط.',
                ])->withInput($request->only('client_email'));
            }

            // توجيه حسب الدور
            if ($client->isAdmin()) {
                return redirect()->route('admin');
            }

            return redirect()->route('index');
        }

        return redirect()->route('client.login.page')->withErrors([
            'client_email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput($request->only('client_email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login.page');
    }
}
