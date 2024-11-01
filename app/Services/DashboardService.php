<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\DestinationsRepository;
use App\Repositories\TripsRepository;

class DashboardService
{
    private DestinationsRepository $destinationRepository;

    private TripsRepository $tripRepository;

    public function __construct(
        DestinationsRepository $destinationRepository,
        TripsRepository $tripRepository
    ) {
        $this->destinationRepository = $destinationRepository;
        $this->tripRepository = $tripRepository;
    }

    public function getCounts(): array
    {
        return [
            'destinationsCount' => $this->destinationRepository->count(),
            'tripsCount' => $this->tripRepository->count(),
        ];
    }
}
