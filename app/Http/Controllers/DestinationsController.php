<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DestinationsService;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    private DestinationsService $destinationsService;

    public function __construct(DestinationsService $destinationsService)
    {
        $this->destinationsService = $destinationsService;
    }

    public function index()
    {
        $destinations = $this->destinationsService->index();

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $this->destinationsService->create($request->all());

        return redirect()->route('destinations.index')->with('success', 'Destino criado com sucesso!');
    }

    public function edit(int $id)
    {
        $destination = $this->destinationsService->index()->find($id);

        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, int $id)
    {
        $this->destinationsService->update($id, $request->all());

        return redirect()->route('destinations.index')->with('success', 'Destino atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->destinationsService->delete($id);

        return redirect()->route('destinations.index')->with('success', 'Destino excluído com sucesso!');
    }
}
