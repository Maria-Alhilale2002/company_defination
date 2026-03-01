<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_complete_admin_workflow(): void
    {
        // 1. تسجيل دخول الأدمن
        $response = $this->post('/login_client', [
            'client_email' => 'admin@example.com',
            'client_password' => 'password',
        ]);

        // يجب أن يتم توجيهه للوحة الإدارة
        $response->assertRedirect('/admin');

        // 2. محاولة الوصول للصفحة الرئيسية بعد تسجيل الدخول
        $response = $this->get('/');

        // يجب أن يتم توجيهه للوحة الإدارة تلقائياً
        $response->assertRedirect('/admin');

        // 3. محاولة الوصول لصفحة التسجيل
        $response = $this->get('/register_client');

        // يجب أن يتم توجيهه لصفحة إنشاء مستخدم جديد
        $response->assertRedirect('/admin/create-user');

        // 4. محاولة الوصول لصفحة تسجيل الدخول
        $response = $this->get('/login_client');

        // يجب أن يتم توجيهه للبروفايل
        $response->assertRedirect('/profile');
    }

    public function test_complete_user_workflow(): void
    {
        // 1. تسجيل دخول المستخدم العادي
        $response = $this->post('/login_client', [
            'client_email' => 'user@example.com',
            'client_password' => 'password',
        ]);

        // يجب أن يتم توجيهه للصفحة الرئيسية
        $response->assertRedirect('/');

        // 2. الوصول للصفحة الرئيسية بعد تسجيل الدخول
        $response = $this->get('/');

        // يجب أن يتمكن من الوصول (لا يتم توجيهه)
        $response->assertStatus(200);

        // 3. محاولة الوصول لصفحة التسجيل
        $response = $this->get('/register_client');

        // يجب أن يتم توجيهه للملف الشخصي
        $response->assertRedirect('/profile');

        // 4. محاولة الوصول لصفحة تسجيل الدخول
        $response = $this->get('/login_client');

        // يجب أن يتم توجيهه للبروفايل
        $response->assertRedirect('/profile');
    }

    protected function setUp(): void
    {
        parent::setUp();

        // إنشاء المستخدمين للاختبار
        $this->artisan('db:seed', ['--class' => 'AdminUserSeeder']);
    }
}
