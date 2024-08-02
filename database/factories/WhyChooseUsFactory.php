<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WhyChooseUs>
 */
class WhyChooseUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon'=>'fa-brands fa-github',
            'title' => $this->faker->sentence,
            'short_description' => $this->faker->paragraph,
            'status' => $this->faker->boolean, // Change 'boolean' to 'status'
            // 'title'=>fake()->sentence(),
            // 'short_description'=>fake()->sentence(),
            // 'status'=>fake()->boolean()
        ];
    }
}
