<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRegisterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client')->except(['showAdminCreateForm', 'adminCreateUser']);
    }

    public function showRegisterForm()
    {
        return view('client_register');
    }

    public function register(ClientRegisterRequest $request)
    {
        $client = Client::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_password' => Hash::make($request->client_password),
            'role' => 'client', // افتراضي
            'is_active' => true,
        ]);

        Auth::guard('client')->login($client);

        // توجيه حسب الدور
        if ($client->isAdmin()) {
            return redirect()->route('admin');
        }

        return redirect()->route('index'); // المستخدم العادي يذهب للصفحة الرئيسية
    }

    // للأدمن: عرض نموذج إنشاء مستخدم جديد
    public function showAdminCreateForm()
    {
        return view('admin_create_user');
    }

    // للأدمن: إنشاء مستخدم جديد
    public function adminCreateUser(ClientRegisterRequest $request)
    {
        $client = Client::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_password' => Hash::make($request->client_password),
            'role' => $request->role ?? 'client',
            'is_active' => true,
        ]);

        return redirect()->route('admin')->with('success', 'تم إنشاء المستخدم بنجاح');
    }
}
