<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Servicses\Client\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * TODO: Get active services for clients
     * Simple list of active services
     */
    public function index(Request $request)
    {
        // TODO: Implement API endpoint for clients to get active services
        // Use $this->serviceService->getAllActiveServicesList()
        $services = $this->serviceService->getAllActiveServicesList();

        // استخدام Resource لتحويل البيانات
        return $this->success([
            'data' => ServiceResource::collection($services)
        ], 'Services retrieved successfully.');
        //return $this->success(['data' => []], 'Services retrieved successfully.');
    }

    /**
     * TODO: Get active service by ID for clients
     */
    public function show($id)
    {
        // TODO: Implement API endpoint to get single active service for clients
        // Use $this->serviceService->getActiveServiceById($id)
        $service = $this->serviceService->getActiveServiceById($id);

        return $this->success(new ServiceResource($service), 'Service retrieved successfully.');
        //return $this->success(new ServiceResource(null), 'Service retrieved successfully.');
    }

    /**
     * TODO: Get active services by category
     * Simple list - may need to implement filtering in controller
     */
    public function byCategory(Request $request, $categoryId)
    {
        // TODO: Implement API endpoint to get active services by category for clients
        // May need to filter $this->serviceService->getAllActiveServicesList() by category
        // return $this->success(['data' => []], 'Services retrieved successfully.');
        $services = $this->serviceService->getAllActiveServicesList()
            ->where('category_id', $categoryId);

        return $this->success([
            'data' => ServiceResource::collection($services)
        ], 'Services retrieved successfully.');
    }

    /**
     * TODO: Get active services by provider
     * Simple list - may need to implement filtering in controller
     */
    public function byProvider(Request $request, $providerId)
    {
        // TODO: Implement API endpoint to get active services by provider for clients
        // May need to filter $this->serviceService->getAllActiveServicesList() by provider
        $services = $this->serviceService->getAllActiveServicesList()
            ->where('provider_id', $providerId);

        return $this->success([
            'data' => ServiceResource::collection($services)
        ], 'Services retrieved successfully.');
        //return $this->success(['data' => []], 'Services retrieved successfully.');
    }
}
