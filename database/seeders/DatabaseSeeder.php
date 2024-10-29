<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Destinations;
use App\Models\Trips;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
        ]);

        Destinations::factory(20)->create()->each(function ($destination) {
            /** @var Destinations $destination */
            Trips::factory(3)->create(['destination_id' => $destination->id]);
        });
    }
}
