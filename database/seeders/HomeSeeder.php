<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'main_text' => 'مرحباً بكم في تك رووت',
            'next_text' => 'نقدم حلول تقنية متكاملة لنجاح أعمالك',
            'description_text' => 'شركة رائدة في مجال البرمجيات والتطوير التقني، نقدم خدمات متميزة في تطوير المواقع والتطبيقات والتسويق الإلكتروني',
            'complete_project' => 150,
            'saticfy_client' => 200,
            'exp_year' => 5,
        ]);
    }
}
