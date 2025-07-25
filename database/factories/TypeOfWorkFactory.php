<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeOfWork>
 */
class TypeOfWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'rate' => $this->faker->randomFloat(2, 100, 1000),
            'code' => strtoupper('TW-' . $this->faker->unique()->numerify('###')),
        ];
    }
}
