<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء مستخدم أدمن افتراضي
        Client::firstOrCreate(
            ['client_email' => 'atharplatform2024@gmail.com'],
            [
                'client_name' => 'مدير النظام',
                'client_password' => Hash::make('MAma737591925'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // إنشاء مستخدم عادي للاختبار
        Client::firstOrCreate(
            ['client_email' => 'user@example.com'],
            [
                'client_name' => 'مستخدم تجريبي',
                'client_password' => Hash::make('password'),
                'role' => 'client',
                'is_active' => true,
            ]
        );
    }
}
