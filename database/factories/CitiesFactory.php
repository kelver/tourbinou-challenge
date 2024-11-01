<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cities;
use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    protected $model = Cities::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'state_id' => States::factory(),
        ];
    }
}
