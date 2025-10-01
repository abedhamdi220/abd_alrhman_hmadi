<?php

namespace App\Http\Servicses\Client;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceService
{
    /**
     * TODO: Get all active services without pagination
     *
     * @return Collection
     */
    public function getAllActiveServicesList(): Collection
    {
        // TODO: Implement method to get all active services with relationships
       return Service::where('status', 'active')->get(); // Temporary return
    }

    /**
     * TODO: Get service by ID (only active services)
     *
     * @param int $id
     * @return Service
     */
    public function getActiveServiceById(int $id): Service
    {
        return Service::where('id', $id)->where('status', 'active')->firstOrFail();
        // TODO: Implement method to get active service by ID with relationships
       // throw new \Exception('Method not implemented'); // Temporary
    }

}
