<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'client_id' => Client::factory(),
            'product_name' => $fakerAr->words(3, true),
            'product_description' => $fakerAr->realText(),
            'product_image' => $this->faker->imageUrl(),
            'product_name_en' => $this->faker->words(3, true),
            'product_description_en' => $this->faker->paragraph(),
        ];
    }
}
