<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => rand(1, 20),
            'user_id' => rand(1, 500),
            'content' => $this->faker->text(255),
            'star_rating' => $this->faker->randomFloat(0, 1, 5)
        ];
    }
}
