<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EmailAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_login_with_existing_seeded_admin(): void
    {
        // تشغيل seeder لإنشاء المستخدمين
        $this->artisan('db:seed', ['--class' => 'AdminUserSeeder']);

        // محاولة تسجيل الدخول بحساب الأدمن
        $response = $this->post('/login_client', [
            'client_email' => 'admin@example.com',
            'client_password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticated('client');
    }

    public function test_can_login_with_existing_seeded_user(): void
    {
        // تشغيل seeder لإنشاء المستخدمين
        $this->artisan('db:seed', ['--class' => 'AdminUserSeeder']);

        // محاولة تسجيل الدخول بحساب المستخدم العادي
        $response = $this->post('/login_client', [
            'client_email' => 'user@example.com',
            'client_password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated('client');
    }

    public function test_can_register_new_user_with_email(): void
    {
        $response = $this->post('/register_client', [
            'client_name' => 'مستخدم جديد',
            'client_email' => 'newuser@example.com',
            'client_password' => 'password123',
            'client_password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated('client');

        // التحقق من إنشاء المستخدم في قاعدة البيانات
        $this->assertDatabaseHas('clients', [
            'client_email' => 'newuser@example.com',
            'client_name' => 'مستخدم جديد',
            'role' => 'client',
            'is_active' => true,
        ]);
    }

    public function test_cannot_register_with_duplicate_email(): void
    {
        // إنشاء مستخدم أولاً
        Client::create([
            'client_name' => 'مستخدم موجود',
            'client_email' => 'existing@example.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        // محاولة التسجيل بنفس الإيميل
        $response = $this->post('/register_client', [
            'client_name' => 'مستخدم جديد',
            'client_email' => 'existing@example.com',
            'client_password' => 'password123',
            'client_password_confirmation' => 'password123',
        ]);

        // Laravel يعيد التوجيه تلقائياً عند فشل التحقق
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['client_email']);
        $this->assertGuest('client');
    }

    public function test_email_validation_works(): void
    {
        // اختبار إيميل غير صحيح
        $response = $this->post('/login_client', [
            'client_email' => 'invalid-email',
            'client_password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['client_email']);
    }
}
