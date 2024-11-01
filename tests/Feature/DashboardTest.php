<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Destinations;
use App\Models\Trips;
use App\Models\User;
use App\Services\DashboardService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected DashboardService $dashboardService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dashboardService = Mockery::mock(DashboardService::class);
    }

    public function test_index_requires_authentication()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_index_returns_dashboard_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Destinations::factory()->count(5)->create();
        Trips::factory()->count(3)->create();

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');

        $response->assertViewHas('destinationsCount', 5);
        $response->assertViewHas('tripsCount', 3);
    }
}
