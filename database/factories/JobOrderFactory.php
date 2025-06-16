<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOrder>
 */
class JobOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeOfWork = \App\Models\TypeOfWork::inRandomOrder()->first();
        $rate = $typeOfWork ? $typeOfWork->rate : 500;
        $workDone = $this->faker->randomFloat(2, 10, 100);

        return [
            'name' => $this->faker->sentence(2),
            'date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'jos_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'type_of_work_id' => $typeOfWork?->id,
            'contractor_id' => \App\Models\Contractor::inRandomOrder()->first()?->id,
            'conductor_id' => \App\Models\Conductor::inRandomOrder()->first()?->id,
            'actual_work_completed' => $workDone,
            'remarks' => $this->faker->sentence(5),
            'reference_number' => strtoupper('JO-' . $this->faker->unique()->numerify('########')),
        ];
    }
}
