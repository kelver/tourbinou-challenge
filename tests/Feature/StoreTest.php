<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Cities;
use App\Models\Destinations;
use App\Models\Trips;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_trips_with_destinations()
    {
        $city = Cities::factory()->create();
        $destination = Destinations::factory()->create(['city_id' => $city->id]);
        $trip = Trips::factory()->create(['destination_id' => $destination->id]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertViewHas('trips', function ($trips) use ($trip) {
            return $trips->contains($trip);
        });
    }
}
