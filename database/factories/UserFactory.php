<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/* `class UserFactory extends Factory` is defining a class called `UserFactory` that extends the
`Factory` class. This class is used to generate fake data for a user model in Laravel using the
Faker library. It defines a `definition` method that returns an array of fake data for a user's
name, tipo_id, email, email_verified_at, password, and remember_token. It also defines an
`unverified` method that sets the email_verified_at attribute to null, indicating that the user's
email address is unverified. */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * This function returns an array with fake data for a user's name, tipo_id, email,
     * email_verified_at, password, and remember_token.
     * 
     * @return array An array with the following keys and values:
     * - 'name': a randomly generated name using the Faker library
     * - 'tipo_id': a randomly generated tipo_id using the Faker library
     * - 'email': a unique and randomly generated email address using the Faker library
     * - 'email_verified_at': the current date and time
     * - 'password': the bcrypt hash of the string 'password'
     * - '
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'tipo_id' => fake()->tipo_id(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ];
    }
   
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}