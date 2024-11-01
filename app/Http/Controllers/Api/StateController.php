<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStates()
    {
        $states = States::select('id', 'name', 'abbr')
            ->orderBy('name')
            ->get();

        return response()->json(['states' => $states]);
    }
    public function getCities(Request $request)
    {
        $cities = Cities::select('id', 'name')
            ->where('state_id', $request->state_id)
            ->orderBy('name')
            ->get();

        return response()->json(['cities' => $cities]);
    }
}
