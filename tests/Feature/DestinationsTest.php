<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Destinations;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestinationsTest extends TestCase
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
        auth()->logout(); // Desautentica o usuário

        $response = $this->get(route('destinations.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_index_returns_paginated_destinations()
    {
        Destinations::factory()->count(10)->create();

        $response = $this->get(route('destinations.index'));

        $response->assertStatus(200);
        $response->assertViewIs('destinations.index');
        $response->assertViewHas('destinations');
    }

    public function test_create_returns_create_view()
    {
        $response = $this->get(route('destinations.create'));

        $response->assertStatus(200);
        $response->assertViewIs('destinations.create');
    }

    public function test_store_creates_destination()
    {
        $state = \App\Models\States::factory()->create();
        $city = \App\Models\Cities::factory()->create(['state_id' => $state->id]);

        $data = [
            'state_id' => $state->id,
            'city_id' => $city->id,
        ];

        $response = $this->post(route('destinations.store'), $data);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('destinations', $data);
        $response->assertRedirect(route('destinations.index'));
        $response->assertSessionHas('success', 'Destino criado com sucesso!');
    }

    public function test_edit_returns_edit_view()
    {
        $destination = Destinations::factory()->create();

        $response = $this->get(route('destinations.edit', $destination->id));

        $response->assertStatus(200);
        $response->assertViewIs('destinations.edit');
        $response->assertViewHas('destination', $destination);
    }

    public function test_update_modifies_destination()
    {
        $state = \App\Models\States::factory()->create();
        $city = \App\Models\Cities::factory()->create(['state_id' => $state->id]);

        $destination = Destinations::factory()->create([
            'state_id' => $state->id,
            'city_id' => $city->id,
        ]);

        $data = [
            'state_id' => $state->id,
            'city_id' => $city->id,
        ];

        $response = $this->put(route('destinations.update', $destination->id), $data);

        $destination->refresh();
        $this->assertEquals($data['state_id'], $destination->state_id);
        $this->assertEquals($data['city_id'], $destination->city_id);
        $response->assertRedirect(route('destinations.index'));
        $response->assertSessionHas('success', 'Destino atualizado com sucesso!');
    }

    public function test_destroy_deletes_destination()
    {
        $destination = Destinations::factory()->create();

        $response = $this->delete(route('destinations.destroy', $destination->id));

        $this->assertDatabaseMissing('destinations', ['id' => $destination->id]);

        $response->assertRedirect(route('destinations.index'));
        $response->assertSessionHas('success', 'Destino excluído com sucesso!');
    }
}
