<?php

namespace App\Http\Servicses\Provider;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceService
{
    /**
     * TODO: Get my services without pagination
     *
     * @return Collection
     */
    public function getMyServicesList(): Collection
    {
        // TODO: Implement method to get all services with relationships
        return collect(); // Temporary return
    }

    /**
     * TODO: Get service by ID
     *
     * @param int $id
     * @return Service
     */
    public function getServiceById(int $id): Service
    {
        // TODO: Implement method to get service by ID with relationships
        throw new \Exception('Method not implemented'); // Temporary
    }

    /**
     * TODO: Create a new service
     *
     * @param array $data
     * @return Service
     */
    public function createService(array $data): Service
    {
        // TODO: Implement method to create a new service
        throw new \Exception('Method not implemented'); // Temporary
    }

}
