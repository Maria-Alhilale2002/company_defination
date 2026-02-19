<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
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
            'about_image' => $this->faker->imageUrl(),
            'vision_image' => $this->faker->imageUrl(),
            'vision_text' => $fakerAr->realText(),
            'about_text' => $fakerAr->realText(),
            'story_text' => $fakerAr->realText(),
            'message_text' => $fakerAr->realText(),
            'principle_text' => $fakerAr->realText(),
            'vision_text_en' => $this->faker->paragraph(), // English
            'about_text_en' => $this->faker->paragraph(), // English
        ];
    }
}
