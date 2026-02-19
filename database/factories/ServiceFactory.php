<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'service_name' => $fakerAr->words(3, true),
            'service_description' => $fakerAr->realText(),
            'service_image' => $this->faker->imageUrl(),
            'service_name_en' => $this->faker->words(3, true),
            'service_description_en' => $this->faker->paragraph(),
        ];
    }
}
