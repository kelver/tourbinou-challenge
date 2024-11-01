<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\TimeEnum;
use App\Models\Destinations;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TripsController extends Controller
{
    public function index()
    {
        $trips = Trips::paginate(5);

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
        $trips = Trips::findOrFail($id);

        return view('trips.edit', [
            'trips' => $trips,
            'times' => TimeEnum::getTranslatedValues(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'destination_id' => 'required|integer|exists:destinations,id',
            'description' => 'nullable|string',
            'time' => ['required', Rule::in(array_keys(TimeEnum::getTranslatedValues()))], // Adicione o time aqui
        ]);

        Trips::create($validatedData);

        return redirect()->route('trips.index')->with('success', 'Viagem criada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'destination_id' => 'required|integer|exists:destinations,id',
            'description' => 'nullable|string',
            'time' => ['required', Rule::in(array_keys(TimeEnum::getTranslatedValues()))], // Certifique-se de validar o time aqui
        ]);

        $trip = Trips::findOrFail($id);
        $trip->update($validatedData);

        return redirect()->route('trips.index')->with('success', 'Passeio atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $trip = Trips::findOrFail($id);
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Passeio apagado com sucesso!');
    }
}
