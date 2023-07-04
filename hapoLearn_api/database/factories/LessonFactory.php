<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
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
            'name' => "lesson-".rand(1, 20),
            'description' => $this->faker->text(5000),
            'time' => $this->faker->randomFloat(1, 10, 100)
        ];
    }
}
