<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => rand(1, 400),
            'name' => "document".rand(1, 20),
            'link' => $this->faker->url()
        ];
    }
}
