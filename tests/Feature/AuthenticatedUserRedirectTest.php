<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticatedUserRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_admin_redirected_to_create_user_when_accessing_register(): void
    {
        // إنشاء أدمن وتسجيل دخوله
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'client');

        // محاولة الوصول لصفحة التسجيل
        $response = $this->get('/register_client');

        // يجب أن يتم توجيهه لصفحة إنشاء مستخدم جديد
        $response->assertRedirect('/admin/create-user');
    }

    public function test_authenticated_user_redirected_to_profile_when_accessing_register(): void
    {
        // إنشاء مستخدم عادي وتسجيل دخوله
        $user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $this->actingAs($user, 'client');

        // محاولة الوصول لصفحة التسجيل
        $response = $this->get('/register_client');

        // يجب أن يتم توجيهه للملف الشخصي
        $response->assertRedirect('/profile');
    }

    public function test_authenticated_admin_redirected_to_admin_when_accessing_login(): void
    {
        // إنشاء أدمن وتسجيل دخوله
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'client');

        // محاولة الوصول لصفحة تسجيل الدخول
        $response = $this->get('/login_client');

        // يجب أن يتم توجيهه للبروفايل
        $response->assertRedirect('/profile');
    }

    public function test_authenticated_user_redirected_to_index_when_accessing_login(): void
    {
        // إنشاء مستخدم عادي وتسجيل دخوله
        $user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $this->actingAs($user, 'client');

        // محاولة الوصول لصفحة تسجيل الدخول
        $response = $this->get('/login_client');

        // يجب أن يتم توجيهه للبروفايل
        $response->assertRedirect('/profile');
    }

    public function test_guest_can_access_register_page(): void
    {
        // زائر غير مسجل يحاول الوصول لصفحة التسجيل
        $response = $this->get('/register_client');

        // يجب أن يتمكن من الوصول
        $response->assertStatus(200);
    }

    public function test_guest_can_access_login_page(): void
    {
        // زائر غير مسجل يحاول الوصول لصفحة تسجيل الدخول
        $response = $this->get('/login_client');

        // يجب أن يتمكن من الوصول
        $response->assertStatus(200);
    }

    public function test_admin_redirected_from_index_to_admin_panel(): void
    {
        // إنشاء أدمن وتسجيل دخوله
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'client');

        // محاولة الوصول للصفحة الرئيسية
        $response = $this->get('/');

        // يجب أن يتم توجيهه للوحة الإدارة
        $response->assertRedirect('/admin');
    }

    public function test_regular_user_can_access_index(): void
    {
        // إنشاء مستخدم عادي وتسجيل دخوله
        $user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $this->actingAs($user, 'client');

        // محاولة الوصول للصفحة الرئيسية
        $response = $this->get('/');

        // يجب أن يتمكن من الوصول (لا يتم توجيهه)
        $response->assertStatus(200);
    }
}
