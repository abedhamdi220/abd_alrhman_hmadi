<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\ServiceStoreRequest;
use App\Http\Resources\ServiceResource;
use App\Http\Servicses\Provider\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    // API Methods

    /**
     * TODO: Get provider's services
     */
    public function index(Request $request)
    {
        $service = $this->serviceService->getMyServicesList();
        // TODO: Implement API endpoint for provider's services
        return $this->success(['data' => [$service ]], 'Services retrieved successfully.');
    }

    /**
     * TODO: Get service by ID
     */
    public function show($id)
    {
        $service = $this->serviceService->getServiceById($id);
        // TODO: Implement API endpoint to get single service for provider
        return $this->success(new ServiceResource(null), 'Service retrieved successfully.');
    }

    /**
     * TODO: Create new service
     */
    public function store(ServiceStoreRequest $request)
    {
        // TODO: Implement API endpoint to create service for provider
        return $this->success(new ServiceResource(null), 'Service created successfully.', 201);
    }

    /**
     * TODO: Update service
     */
    public function update(ServiceStoreRequest $request, $id)
    {
        // TODO: Implement API endpoint to update service for provider
        return $this->success(new ServiceResource(null), 'Service updated successfully.');
    }

    /**
     * TODO: Delete service
     */
    public function destroy($id)
    {
        // TODO: Implement API endpoint to delete service for provider
        return $this->success(null, 'Service deleted successfully.');
    }

}
