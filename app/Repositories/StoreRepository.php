<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Trips;

class StoreRepository
{
    public function getAllTripsWithDestinations()
    {
        return Trips::with('destination.city.state')->get();
    }
}
