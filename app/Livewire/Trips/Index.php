<?php

declare(strict_types=1);

namespace App\Livewire\Trips;

use App\Models\Trips;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.trips.index', [
            'trips' => Trips::with('destination.city.state')->paginate(5),
        ])->layout('layouts.app');
    }

    public function paginationView()
    {
        return 'vendor.pagination.custom-tailwind';
    }
}
