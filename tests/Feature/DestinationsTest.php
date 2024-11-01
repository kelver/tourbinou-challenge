<?php

declare(strict_types=1);

use App\Models\Destinations;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

it('requires authentication for index', function () {
    auth()->logout(); // Desautentica o usuário

    $response = $this->get(route('destinations.index'));

    $response->assertRedirect(route('login'));
});

it('returns paginated destinations on index', function () {
    Destinations::factory()->count(10)->create();

    $response = $this->get(route('destinations.index'));

    $response->assertStatus(200);
    $response->assertViewIs('destinations.index');
    $response->assertViewHas('destinations');
});

it('returns create view', function () {
    $response = $this->get(route('destinations.create'));

    $response->assertStatus(200);
    $response->assertViewIs('destinations.create');
});

it('creates a destination', function () {
    $state = App\Models\States::factory()->create();
    $city = App\Models\Cities::factory()->create(['state_id' => $state->id]);

    $data = [
        'state_id' => $state->id,
        'city_id' => $city->id,
    ];

    $response = $this->post(route('destinations.store'), $data);

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseHas('destinations', $data);
    $response->assertRedirect(route('destinations.index'));
    $response->assertSessionHas('success', 'Destino criado com sucesso!');
});

it('returns edit view', function () {
    $destination = Destinations::factory()->create();

    $response = $this->get(route('destinations.edit', $destination->id));

    $response->assertStatus(200);
    $response->assertViewIs('destinations.edit');
    $response->assertViewHas('destination', $destination);
});

it('modifies a destination', function () {
    $state = App\Models\States::factory()->create();
    $city = App\Models\Cities::factory()->create(['state_id' => $state->id]);

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
});

it('deletes a destination', function () {
    $destination = Destinations::factory()->create();

    $response = $this->delete(route('destinations.destroy', $destination->id));

    $this->assertDatabaseMissing('destinations', ['id' => $destination->id]);

    $response->assertRedirect(route('destinations.index'));
    $response->assertSessionHas('success', 'Destino excluído com sucesso!');
});
