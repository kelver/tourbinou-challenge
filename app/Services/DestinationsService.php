<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Destinations;
use App\Repositories\DestinationsRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DestinationsService
{
    private DestinationsRepository $repository;

    public function __construct(DestinationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(int $perPage = 5)
    {
        return $this->repository->all($perPage);
    }

    public function create(array $data): Destinations
    {
        $this->validate($data);

        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Destinations
    {
        $destination = $this->repository->find($id);
        if (! $destination) {
            throw new \Exception('Destination not found.');
        }
        $this->validate($data);

        return $this->repository->update($destination, $data);
    }

    public function delete(int $id): bool
    {
        $destination = $this->repository->find($id);
        if (! $destination) {
            throw new \Exception('Destination not found.');
        }

        return $this->repository->delete($destination);
    }

    private function validate(array $data)
    {
        $validator = Validator::make($data, [
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
