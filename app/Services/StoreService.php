<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\StoreRepository;

class StoreService
{
    protected StoreRepository $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getTrips()
    {
        return $this->storeRepository->getAllTripsWithDestinations();
    }
}
