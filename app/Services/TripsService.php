<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Trips;
use App\Repositories\TripsRepository;

class TripsService
{
    protected TripsRepository $tripsRepository;

    public function __construct(TripsRepository $tripsRepository)
    {
        $this->tripsRepository = $tripsRepository;
    }

    public function getTrips($perPage = 5)
    {
        return $this->tripsRepository->getAllTripsPaginated($perPage);
    }

    public function getTrip($id)
    {
        return $this->tripsRepository->findTripById($id);
    }

    public function createTrip(array $data)
    {
        return Trips::create($data);
    }

    public function updateTrip(Trips $trip, array $data)
    {
        $trip->update($data);

        return $trip;
    }

    public function deleteTrip(Trips $trip)
    {
        $trip->delete();
    }
}
