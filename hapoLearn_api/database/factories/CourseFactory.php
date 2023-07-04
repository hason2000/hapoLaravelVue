<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'img_url' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
