<?php

declare(strict_types=1);

use App\Models\Trips;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

it('requires authentication for index', function () {
    auth()->logout();

    $response = $this->get(route('trips.index'));

    $response->assertRedirect(route('login'));
});

it('returns paginated trips on index', function () {
    Trips::factory()->count(10)->create();

    $response = $this->get(route('trips.index'));

    $response->assertStatus(200);
    $response->assertViewIs('trips.index');
    $response->assertViewHas('trips');
});

it('returns create view', function () {
    $response = $this->get(route('trips.create'));

    $response->assertStatus(200);
    $response->assertViewIs('trips.create');
});

it('creates a trip', function () {
    $destination = App\Models\Destinations::factory()->create();

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
});

it('returns edit view', function () {
    $trip = Trips::factory()->create();

    $response = $this->get(route('trips.edit', $trip->id));

    $response->assertStatus(200);
    $response->assertViewIs('trips.edit');
    $response->assertViewHas('trip', $trip);
});

it('modifies a trip', function () {
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
});

it('deletes a trip', function () {
    $trip = Trips::factory()->create();

    $response = $this->delete(route('trips.destroy', $trip->id));

    $this->assertDatabaseMissing('trips', ['id' => $trip->id]);

    $response->assertRedirect(route('trips.index'));
    $response->assertSessionHas('success', 'Passeio apagado com sucesso!');
});
