<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Trips;

class StoreController extends Controller
{
    public function index()
    {
        $tripsCount = Trips::with('destination.city.state')->get();

        return view('home', [
            'trips' => $tripsCount,
        ]);
    }
}
