<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagFactory extends Factory
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
            'tag_id' => rand(1, 40)
        ];
    }
}
