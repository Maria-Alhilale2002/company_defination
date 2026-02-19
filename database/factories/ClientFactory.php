<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerAr = \Faker\Factory::create('ar_SA');

        return [
            'client_name' => $fakerAr->company(),
            'client_email' => $this->faker->unique()->safeEmail(),
            'client_password' => Hash::make('password'),
            'client_logo' => $this->faker->imageUrl(100, 100, 'business'),
            'client_feature' => $fakerAr->realText(),
            'client_name_en' => $this->faker->company(),
            'client_feature_en' => $this->faker->sentence(),
        ];
    }
}
