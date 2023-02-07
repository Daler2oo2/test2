<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = $this->faker->sentence(6, true);
        $desc = $this->faker->sentence(10,true);
        $text = $this->faker->sentence(20, true);
        return [
            'title' => $title,
            'desc' => $desc,
            'text' => $text,
        ];
    }
}
