<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\TimeEnum;
use App\Services\TripsService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TripsController extends Controller
{
    protected TripsService $tripsService;

    public function __construct(TripsService $tripsService)
    {
        $this->tripsService = $tripsService;
    }

    public function index()
    {
        $trips = $this->tripsService->getTrips();

        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        return view('trips.create', [
            'times' => TimeEnum::getTranslatedValues(),
        ]);
    }

    public function edit($id)
    {
        $trip = $this->tripsService->getTrip($id);

        return view('trips.edit', [
            'trip' => $trip,
            'times' => TimeEnum::getTranslatedValues(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateTrip($request);

        $this->tripsService->createTrip($validatedData);

        return redirect()->route('trips.index')->with('success', 'Viagem criada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateTrip($request);

        $trip = $this->tripsService->getTrip($id);
        $this->tripsService->updateTrip($trip, $validatedData);

        return redirect()->route('trips.index')->with('success', 'Passeio atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $trip = $this->tripsService->getTrip($id);
        $this->tripsService->deleteTrip($trip);

        return redirect()->route('trips.index')->with('success', 'Passeio apagado com sucesso!');
    }

    protected function validateTrip(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'destination_id' => 'required|integer|exists:destinations,id',
            'description' => 'nullable|string',
            'time' => ['required', Rule::in(array_keys(TimeEnum::getTranslatedValues()))],
        ]);
    }
}
