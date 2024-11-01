<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destinations;

class DestinationController extends Controller
{
    public function getDestinations()
    {
        $destinations = Destinations::with('city.state')
            ->orderBy('id')
            ->get();

        $formattedDestinations = $destinations->map(function ($destination) {
            return [
                'id' => $destination->id,
                'text' => sprintf(
                    '(%s) %s - %s',
                    $destination->city->state->abbr,
                    $destination->city->state->name,
                    $destination->city->name
                ),
            ];
        });

        return response()->json(['destinations' => $formattedDestinations]);
    }
}
