<?php

declare(strict_types=1);

use App\Models\Cities;
use App\Models\Destinations;
use App\Models\Trips;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns trips with destinations on index', function () {
    $city = Cities::factory()->create();
    $destination = Destinations::factory()->create(['city_id' => $city->id]);
    $trip = Trips::factory()->create(['destination_id' => $destination->id]);

    $response = $this->get(route('home'));

    $response->assertStatus(200);
    $response->assertViewIs('home');
    $response->assertViewHas('trips', fn ($trips) => $trips->contains($trip));
});
