<?php

declare(strict_types=1);

use App\Models\Destinations;
use App\Models\Trips;
use App\Models\User;
use App\Services\DashboardService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->dashboardService = Mockery::mock(DashboardService::class);
});

it('requires authentication to access the dashboard', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});

it('returns the dashboard view with correct counts', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Destinations::factory()->count(5)->create();
    Trips::factory()->count(3)->create();

    $response = $this->get(route('dashboard'));

    $response->assertStatus(200);
    $response->assertViewIs('dashboard');
    $response->assertViewHas('destinationsCount', 5);
    $response->assertViewHas('tripsCount', 3);
});
