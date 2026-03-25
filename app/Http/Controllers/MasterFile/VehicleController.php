<?php

namespace App\Http\Controllers\MasterFile;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterFiles\Vehicles\CreateRequest;
use App\Http\Requests\MasterFiles\Vehicles\UpdateRequest;
use App\Repositories\MasterFiles\EmployeeRepository;
use App\Repositories\MasterFiles\VehicleRepository;
use App\Service\MasterFile\ManufacturerService;
use App\Service\MasterFile\VehicleService;
use App\Service\MasterFile\VehicleTypeService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function __construct(protected EmployeeRepository $emp_repo,protected VehicleTypeService $vehicleTypeService,protected VehicleService $vehicleService,protected ManufacturerService $manufacturerService)
    {

    }

    public function index(Request $request)
    {
        $type = ($request->input('search')) ? $request->input('search') : 0;
        $vehicleTypes = $this->vehicleTypeService->getAllVehicleTypes();
        $manufacturers = $this->manufacturerService->getAllManufacturer();
        $employees = $this->emp_repo->getAllEmployees();
        $supplers = DB::table('suppliers')->get();

        $vehicles = $this->vehicleService->getAllVehicles($type);

        return Inertia::render('MyApp/MasterFiles/Vehicles/MainPage',
        [
            'vehicleTypes' => $vehicleTypes,
            'manufacturers' => $manufacturers,
            'employees' => $employees,
            'vehicles' => $vehicles,
            'suppliers' => $supplers
        ]);
    }

    public function create(CreateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->vehicleService->createVehicle($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Vehicle created successfully']); 
    }

    public function update(UpdateRequest $request)
    {
       $validated = $request->validated();

        $result = $this->vehicleService->updateVehicle($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Vehicle updated successfully']); 
    }
}
