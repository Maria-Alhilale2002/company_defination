<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'name' => $fakerAr->name(),
            'email' => $this->faker->safeEmail(),
            'subject' => $fakerAr->realText(50),
            'message' => $fakerAr->realText(),
            'name_en' => $this->faker->name(),
            'subject_en' => $this->faker->sentence(),
            'message_en' => $this->faker->paragraph(),
        ];
    }
}
