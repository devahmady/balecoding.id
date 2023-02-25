<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'more' => $this->faker->paragraph(),
            'isi' => $this->faker->paragraph(mt_rand(5,10)),
            'user_id' => 1,
            'category_id' => 1
        ];
    }
}
