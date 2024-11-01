<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatesFactory extends Factory
{
    protected $model = States::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->state,
            'abbr' => strtoupper($this->faker->lexify('??')),
        ];
    }
}
