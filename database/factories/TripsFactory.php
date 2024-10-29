<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Destinations;
use App\Models\Trips;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripsFactory extends Factory
{
    protected $model = Trips::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'time' => $this->faker->randomElement(['Morning', 'Afternoon', 'Evening']),
            'destination_id' => Destinations::inRandomOrder()->first()->id,
            'description' => $this->faker->words(20, true),
        ];
    }
}
