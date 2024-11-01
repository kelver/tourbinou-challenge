<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index()
    {
        $destinations = Destinations::paginate(5);

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        Destinations::create($validatedData);

        return redirect()->route('destinations.index')->with('success', 'Destino criado com sucesso!');
    }

    public function show(Destinations $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    public function edit(Destinations $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destinations $destination)
    {
        $validatedData = $request->validate([
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        $destination->update($validatedData);

        return redirect()->route('destinations.index')->with('success', 'Destino atualizado com sucesso!');
    }

    public function destroy(Destinations $destination)
    {
        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destino excluído com sucesso!');
    }
}
