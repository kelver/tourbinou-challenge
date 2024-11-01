<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Trips;

class TripsRepository
{
    public function getAllTripsPaginated($perPage = 5)
    {
        return Trips::paginate($perPage);
    }

    public function findTripById($id)
    {
        return Trips::findOrFail($id);
    }

    public function count(): int
    {
        return Trips::count();
    }
}
