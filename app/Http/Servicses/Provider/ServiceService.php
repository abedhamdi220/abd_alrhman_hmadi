<?php

namespace App\Http\Servicses\Provider;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
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
        $services = Service::with("provider","category")->get();
        // TODO: Implement method to get all services with relationships
        return collect(  $services); // Temporary return
    }

    /**
     * TODO: Get service by ID
     *
     * @param int $id
     * @return Service
     */
    public function getServiceById(int $id): Service
    {

        $service = Service::with("provider","category")->findOrFail($id);
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
        return DB::transaction(function () use ($data) {
            return Service::create($data);
        });
        

    }

    

        // TODO: Implement method to create a new service
        // throw new \Exception('Method not implemented'); // Temporary
    

}
