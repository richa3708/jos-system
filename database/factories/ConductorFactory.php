<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conductor>
 */
class ConductorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->boolean ? $this->faker->firstName() : null,
            'last_name' => $this->faker->lastName(),
            'staff_id' => strtoupper('CD-' . $this->faker->unique()->numerify('###')),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'department_name' => $this->faker->randomElement(['HR', 'Finance', 'Tech', 'Operations']),
        ];
    }
}
