<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Trips;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function index()
    {
        $trips = Trips::paginate(5);

        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Trips::create($request->all());

        return redirect()->route('trips.index')->with('success', 'Viagem criada com sucesso!');
    }

    public function edit($id)
    {
        $trip = Trips::findOrFail($id);

        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $trip = Trips::findOrFail($id);
        $trip->update($request->all());

        return redirect()->route('trips.index')->with('success', 'Passeio atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $trip = Trips::findOrFail($id);
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Passeio apagado com sucesso!');
    }
}
