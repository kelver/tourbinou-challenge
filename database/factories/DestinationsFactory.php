<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Destinations;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationsFactory extends Factory
{
    protected $model = Destinations::class;

    public function definition(): array
    {
        $city = Cities::inRandomOrder()->first();

        return [
            'city_id' => $city->id,
            'state_id' => $city->state_id,
        ];
    }
}
