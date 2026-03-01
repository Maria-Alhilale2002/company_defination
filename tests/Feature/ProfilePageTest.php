<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_profile_page_displays_correctly(): void
    {
        // إنشاء أدمن للاختبار
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'client');

        $response = $this->get('/profile');

        $response->assertStatus(200);

        // Debug: طباعة المحتوى المُرجع
        echo "\n=== RESPONSE CONTENT ===\n";
        echo $response->getContent();
        echo "\n=== END CONTENT ===\n";

        $response->assertSee('Admin User');
        $response->assertSee('مدير النظام');
        $response->assertSee('admin@test.com');
        $response->assertSee('لوحة الإدارة');
        $response->assertSee('إنشاء مستخدم');
        $response->assertSee('الصفحة الرئيسية');
    }

    public function test_regular_user_profile_page_displays_correctly(): void
    {
        // إنشاء مستخدم عادي للاختبار
        $user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $this->actingAs($user, 'client');

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee('Regular User');
        $response->assertSee('مستخدم');
        $response->assertSee('user@test.com');
        $response->assertSee('الصفحة الرئيسية');
        $response->assertDontSee('لوحة الإدارة');
        $response->assertDontSee('إنشاء مستخدم');
    }
}
