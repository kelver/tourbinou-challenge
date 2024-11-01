<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\StoreService;

class StoreController extends Controller
{
    protected StoreService $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index()
    {
        $trips = $this->storeService->getTrips();

        return view('home', [
            'trips' => $trips,
        ]);
    }
}
