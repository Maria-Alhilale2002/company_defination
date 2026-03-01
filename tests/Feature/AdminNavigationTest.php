<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminNavigationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // إنشاء أدمن للاختبار
        $this->admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // إنشاء مستخدم عادي للاختبار
        $this->user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);
    }

    public function test_admin_can_access_profile_page(): void
    {
        $this->actingAs($this->admin, 'client');

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee($this->admin->client_name);
        $response->assertSee('مدير النظام');
        $response->assertSee('الصفحة الرئيسية');
        $response->assertSee('لوحة الإدارة');
        $response->assertSee('إنشاء مستخدم');
    }

    public function test_regular_user_can_access_profile_page(): void
    {
        $this->actingAs($this->user, 'client');

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee($this->user->client_name);
        $response->assertSee('مستخدم');
        $response->assertSee('الصفحة الرئيسية');
        $response->assertDontSee('لوحة الإدارة');
        $response->assertDontSee('إنشاء مستخدم');
    }

    public function test_admin_can_access_create_user_page(): void
    {
        $this->actingAs($this->admin, 'client');

        $response = $this->get('/admin/create-user');

        $response->assertStatus(200);
        $response->assertSee('إنشاء مستخدم جديد');
        $response->assertSee('لوحة الإدارة');
        $response->assertSee('الصفحة الرئيسية');
        $response->assertSee('الملف الشخصي');
    }

    public function test_regular_user_cannot_access_create_user_page(): void
    {
        $this->actingAs($this->user, 'client');

        $response = $this->get('/admin/create-user');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $this->actingAs($this->admin, 'client');

        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('إدارة صفحات الموقع');
        $response->assertSee('الصفحة الرئيسية');
        $response->assertSee('إنشاء مستخدم');
        $response->assertSee('الملف الشخصي');
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $this->actingAs($this->user, 'client');

        $response = $this->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_home_button_works_from_profile(): void
    {
        $this->actingAs($this->admin, 'client');

        // الذهاب للملف الشخصي
        $this->get('/profile')->assertStatus(200);

        // محاولة الوصول للصفحة الرئيسية (يجب أن يتم توجيهه للأدمن)
        $response = $this->get('/');
        $response->assertRedirect('/admin');
    }

    public function test_user_home_button_works_from_profile(): void
    {
        $this->actingAs($this->user, 'client');

        // الذهاب للملف الشخصي
        $this->get('/profile')->assertStatus(200);

        // الوصول للصفحة الرئيسية (يجب أن يبقى فيها)
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
