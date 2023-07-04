<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'phonenumber' => $this->faker->phoneNumber(10),
            'address' => $this->faker->address(),
            'date_of_birth' => $this->faker->date('Y-m-d', 'now'),
            'username' => $this->faker->userName(),
            'avata_url' => $this->faker->imageUrl(),
            'role' => $this->faker->numberBetween(0, 1),
            'aboutme' => $this->faker->text(70)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
