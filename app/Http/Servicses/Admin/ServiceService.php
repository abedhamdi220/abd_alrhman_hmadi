<?php

namespace App\Http\Servicses\Admin;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceService
{
    /**
     * TODO: Get all services without pagination
     *
     * @return Collection
     */
    public function getAllServicesList(): Collection
    {
        return Service::with(['category', 'provider'])->get();
        // TODO: Implement method to get all services with relationships
        // Temporary return
    }

    /**
     * TODO: Get service by ID
     *
     * @param int $id
     * @return Service
     */
    public function getServiceById(Service $service): Service
    {
        return $service->with(['category', 'provider'])->firstOrFail();
        // TODO: Implement method to get service by ID with relationships
        // throw new \Exception('Method not implemented'); // Temporary
    }

    /**
     * TODO: Update service status
     *
     * @param int $id
     * @param string $status
     * @return Service
     */
    public function updateServiceStatus(Service $service, string $status): Service
    {
        $service->findOrFail($service->id);
        $service->status = $status;
        $service->save();
        return $service;
        // TODO: Implement method to update service status
        // Temporary
    }
}
