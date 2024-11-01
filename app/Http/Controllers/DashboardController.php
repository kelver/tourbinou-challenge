<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $counts = $this->dashboardService->getCounts();

        return view('dashboard', [
            'destinationsCount' => $counts['destinationsCount'],
            'tripsCount' => $counts['tripsCount'],
        ]);
    }
}
