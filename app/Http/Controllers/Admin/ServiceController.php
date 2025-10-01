<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Servicses\Admin\ServiceService;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * TODO: Display a listing of all services (Web Route)
     * Admin can see all services regardless of status
     */
    public function index()
    {
        $services = $this->serviceService->getAllServicesList();
        // TODO: Implement method to show all services list page
        // Use $this->serviceService->getAllServicesList()
        return view("admin.services.index", compact("services"));
    }

    /**
     * TODO: Display the specified service (Web Route)
     */
    public function show(Service $service)
    {
        $service = $this->serviceService->getServiceById($service);

        // TODO: Implement method to show single service
        // Use $this->serviceService->getServiceById($id)
        return view("admin.services.show", ['service' => $service]);
    }

    /**
     * TODO: Update service status (Web Route)
     */
    public function updateStatus(Request $request, Service $service)
    {
        $service = $this->serviceService->updateServiceStatus($service, $request->status);

        

        // TODO: Implement method to update service status
        // Use $this->serviceService->updateServiceStatus($id, $request->status)
        return redirect()->route('services.index')
            ->with('success', 'Service status updated successfully.');
    }

}
