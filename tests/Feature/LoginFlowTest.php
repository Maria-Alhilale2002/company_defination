<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_email_and_password(): void
    {
        // إنشاء مستخدم للاختبار
        $client = Client::create([
            'client_name' => 'Test User',
            'client_email' => 'test@example.com',
            'client_password' => Hash::make('password123'),
            'role' => 'client',
            'is_active' => true,
        ]);

        // محاولة تسجيل الدخول
        $response = $this->post('/login_client', [
            'client_email' => 'test@example.com',
            'client_password' => 'password123',
        ]);

        // التحقق من نجاح تسجيل الدخول والتوجيه
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($client, 'client');
    }

    public function test_login_with_invalid_email(): void
    {
        $response = $this->post('/login_client', [
            'client_email' => 'nonexistent@example.com',
            'client_password' => 'password123',
        ]);

        $response->assertRedirect('/login_client');
        $response->assertSessionHasErrors(['client_email']);
        $this->assertGuest('client');
    }

    public function test_login_with_invalid_password(): void
    {
        // إنشاء مستخدم للاختبار
        Client::create([
            'client_name' => 'Test User',
            'client_email' => 'test@example.com',
            'client_password' => Hash::make('correct_password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $response = $this->post('/login_client', [
            'client_email' => 'test@example.com',
            'client_password' => 'wrong_password',
        ]);

        $response->assertRedirect('/login_client');
        $response->assertSessionHasErrors(['client_email']);
        $this->assertGuest('client');
    }

    public function test_admin_login_redirects_to_admin_dashboard(): void
    {
        // إنشاء أدمن للاختبار
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->post('/login_client', [
            'client_email' => 'admin@test.com',
            'client_password' => 'admin123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin, 'client');
    }
}
