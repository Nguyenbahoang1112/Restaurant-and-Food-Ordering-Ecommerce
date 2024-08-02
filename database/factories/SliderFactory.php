<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slider;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/uploads/test', // Định nghĩa dưới dạng chuỗi
            'offer' => '50%', // Định nghĩa dưới dạng chuỗi
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(10),
            'short_description' => fake()->paragraph(2),
            'button_link' => fake()->url(),
            'status' => fake()->boolean(),
        ];
    }
}
