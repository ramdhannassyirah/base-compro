<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
        {
            return [
                'thumbnail' => $this->faker->imageUrl(),
                'title' => $this->faker->sentence(),
                'description' => $this->faker->sentence(),
                'content' => $this->faker->paragraph(),
                'slug' => $this->faker->slug(),
                'author_id' => \App\Models\User::inRandomOrder()->first()->id, // harus ada user
            ];
        }

}
