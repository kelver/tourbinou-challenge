<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Trips;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TripsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_index_requires_authentication()
    {
        auth()->logout();

        $response = $this->get(route('trips.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_index_returns_paginated_trips()
    {
        Trips::factory()->count(10)->create();

        $response = $this->get(route('trips.index'));

        $response->assertStatus(200);
        $response->assertViewIs('trips.index');
        $response->assertViewHas('trips');
    }

    public function test_create_returns_create_view()
    {
        $response = $this->get(route('trips.create'));

        $response->assertStatus(200);
        $response->assertViewIs('trips.create');
    }

    public function test_store_creates_trip()
    {
        $destination = \App\Models\Destinations::factory()->create();

        $data = [
            'name' => 'Viagem Teste',
            'destination_id' => $destination->id,
            'description' => 'Descrição da viagem.',
            'time' => 'Morning',
        ];

        $response = $this->post(route('trips.store'), $data);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('trips', $data);
        $response->assertRedirect(route('trips.index'));
        $response->assertSessionHas('success', 'Viagem criada com sucesso!');
    }

    public function test_edit_returns_edit_view()
    {
        $trip = Trips::factory()->create();

        $response = $this->get(route('trips.edit', $trip->id));

        $response->assertStatus(200);
        $response->assertViewIs('trips.edit');
        $response->assertViewHas('trip', $trip);
    }

    public function test_update_modifies_trip()
    {
        $trip = Trips::factory()->create();

        $data = [
            'name' => 'Viagem Atualizada',
            'destination_id' => 1,
            'description' => 'Descrição atualizada.',
            'time' => 'Evening',
        ];

        $response = $this->put(route('trips.update', $trip->id), $data);

        $trip->refresh();
        $this->assertEquals($data['name'], $trip->name);
        $response->assertRedirect(route('trips.index'));
        $response->assertSessionHas('success', 'Passeio atualizado com sucesso!');
    }

    public function test_destroy_deletes_trip()
    {
        $trip = Trips::factory()->create();

        $response = $this->delete(route('trips.destroy', $trip->id));

        $this->assertDatabaseMissing('trips', ['id' => $trip->id]);

        $response->assertRedirect(route('trips.index'));
        $response->assertSessionHas('success', 'Passeio apagado com sucesso!');
    }
}
