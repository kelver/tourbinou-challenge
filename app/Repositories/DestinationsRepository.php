<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Destinations;

class DestinationsRepository
{
    public function all(int $perPage = 5)
    {
        return Destinations::paginate($perPage);
    }

    public function create(array $data): Destinations
    {
        return Destinations::create($data);
    }

    public function find(int $id): ?Destinations
    {
        return Destinations::find($id);
    }

    public function update(Destinations $destination, array $data): Destinations
    {
        $destination->update($data);

        return $destination;
    }

    public function delete(Destinations $destination): bool
    {
        return $destination->delete();
    }
}
