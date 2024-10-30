<?php

declare(strict_types=1);

namespace App\Livewire\Destinations;

use App\Models\Destinations;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.destinations.index', [
            'destinations' => Destinations::with('trips', 'city.state')->paginate(5),
        ])->layout('layouts.app');
    }

    public function paginationView()
    {
        return 'vendor.pagination.custom-tailwind';
    }
}
