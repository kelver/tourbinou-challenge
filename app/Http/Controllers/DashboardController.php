<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Trips;

class DashboardController extends Controller
{
    public function index()
    {
        $destinationsCount = Destinations::count();
        $tripsCount = Trips::count();

        return view('dashboard', [
            'destinationsCount' => $destinationsCount,
            'tripsCount' => $tripsCount,
        ]);
    }
}
