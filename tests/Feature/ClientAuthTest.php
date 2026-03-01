<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ClientAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_redirects_to_admin_page(): void
    {
        $admin = Client::create([
            'client_name' => 'Admin User',
            'client_email' => 'admin@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->post('/login_client', [
            'client_email' => 'admin@test.com',
            'client_password' => 'password',
        ]);

        $response->assertRedirect('/admin');
    }

    public function test_regular_user_redirects_to_index_page(): void
    {
        $user = Client::create([
            'client_name' => 'Regular User',
            'client_email' => 'user@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        $response = $this->post('/login_client', [
            'client_email' => 'user@test.com',
            'client_password' => 'password',
        ]);

        $response->assertRedirect('/');
    }

    public function test_inactive_user_cannot_login(): void
    {
        $user = Client::create([
            'client_name' => 'Inactive User',
            'client_email' => 'inactive@test.com',
            'client_password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => false,
        ]);

        $response = $this->post('/login_client', [
            'client_email' => 'inactive@test.com',
            'client_password' => 'password',
        ]);

        $response->assertRedirect('/login_client');
        $response->assertSessionHasErrors(['client_email']);
    }
}
